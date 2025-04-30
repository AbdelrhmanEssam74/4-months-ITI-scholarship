
select   rental_id, rental_date, datediff(now(), rental_date ) days from rental;

select first_name , date_format(create_date , '%W, %M %d, %y') join_date from customer;

select title old_title , replace(title,' ','-') new_name from film;

select payment_id, amount,
  case
    when amount > 8 then 'High'
    when amount > 5 then 'Medium'
    else 'Low'
  end  payment
from payment;

select payment_id, ifnull(amount, 0)  safe_amount from payment;


create function get_category2 ( category_name varchar(50))
returns int
deterministic reads sql data
begin
    declare film_count INT 
	delimiter //
    select count(*) into film_count
    from film f
    join film_category fc on f.film_id = fc.film_id
    join category c on fc.category_id = c.category_id
    where c.name = cat_name //
    delimiter ;
    return film_count 
end 



delimiter //
create function customer_full_name(cust_id int)
returns varchar(100)
deterministic
begin
    declare full_name varchar(100);
    select concat(first_name, ' ', last_name) into full_name
    from customer
    where customer_id = cust_id;
	return  full_name;
end //
delimiter ;

select customer_full_name(customer_id) from customer;

delimiter //
create function actor_film_count(act_id int)
returns int
deterministic
begin
    declare film_count  int;
    select count(*) into film_count
    from film_actor
    where actor_id = act_id;
	return  film_count;
end //
delimiter ;

select actor_film_count(actor_id) from actor;

select customer_id from rental
where rental_date > '2005-05-25';

create index idx_rental_date on rental(rental_date);

select * from film
where rating = 'PG' and rental_duration = 7;

create index idx_film_rating on film(rating, rental_duration);


