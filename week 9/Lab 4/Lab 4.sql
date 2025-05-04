delimiter //
create procedure get_film_rating(in inputValue varchar(20))
begin
	select * from film where rating = inputValue;
end //
delimiter //
set @rating = "NC-17";
call get_film_rating(@rating)

---------------------------------------------- 

delimiter //
create procedure countRental(in id int, out rental_count int)
begin 
	select count(*)  into rental_count
    from rental r
	join inventory i on i.inventory_id = r.inventory_id
	where i.film_id = id;
end //
delimiter //
set @filmID = 3;
set @rental_total  = 0;
call countRental(@filmID , @rental_total)
select @rental_total;

----------------------------------------

delimiter /
create trigger prevent_negative_value
before update on film
for each row
begin
	if new.rental_rate  < 0 then
		signal sqlstate '45000'
        set message_text = 'error: can\'t be negative value'; 
	end if;
end;
delimiter /
update film set rental_rate = -1 where title  = "ACADEMY DINOSAUR";

------------------------------------------------

create table customer_backup
(
    customer_id int,
    store_id int,
    first_name varchar(45),
    last_name varchar(45),
    email varchar(50),
    address_id int,
    active BOOLEAN,
    create_date datetime,
    last_update timestamp
);

delimiter //
create trigger backup_new_customer
after insert on customer
for each row
begin
    insert into customer_backup (first_name, last_name, email)
    values (new.first_name, new.last_name, new.email);
end //
delimiter ;

INSERT INTO customer (store_id, first_name, last_name, email, address_id, active, create_date, last_update)
VALUES (1, 'test', 'test', 'test@yahoo.com', 5, 1, NOW(), NOW());

select * from customer_backup WHERE first_name = 'test';

--------------------------------------------

create table deleted_payments (
    payment_id int,
    customer_id int,
    staff_id int,
    rental_id int,
    amount decimal(5,2),
    payment_date datetime,
    last_update timestamp
);

delimiter //
create trigger backup_deleted_payment
after delete on payment
for each row
begin
    insert into deleted_payments (
        payment_id, customer_id, staff_id, rental_id,
        amount, payment_date, last_update
    )
    values (
        old.payment_id, old.customer_id, old.staff_id, old.rental_id,
        old.amount, old.payment_date, old.last_update
    );
end //
delimiter ;

delete from payment where payment_id = 5;
select  * from deleted_payments where payment_id = 5;

---------------------------------------------------
create table film_audit (
    old_title varchar(255),
    new_title varchar(255)
);

delimiter //
create trigger log_film_title_change
before update on film
for each row
begin
    IF old.title <> new.title then
        insert into film_audit (old_title, new_title)
        VALUES ( old.title, new.title);
    end if;
end //
delimiter ;

update film set title = 'new name' where film_id = 2;

select * from film_audit ;

