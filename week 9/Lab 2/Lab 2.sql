create view cutomer_total_payment as
select  c.customer_id, count(p.payment_id) total_payment from customer c
join payment p on c.customer_id = p.customer_id
group by c.customer_id;


create view films_rating_actors as
select f.title , a.first_name , a.last_name from film f
join film_actor fa on f.film_id = fa.film_id
join actor a on a.actor_id = fa.actor_id
where f.rating = "PG-13";


create view file_lang as
select distinct l.name from film f
join language l on f.language_id = l.language_id;

create view active as
select first_name, last_name, email, 'Customer' as role
from customer
where active = 1
union
select first_name, last_name, email, 'staff' as role
from staff
where active = 1;

create view films_categories as
select f.title, c.name as category
from film f
join film_category fc on f.film_id = fc.film_id
join category c on fc.category_id = c.category_id;

create view films_store as
select s.store_id, COUNT(i.inventory_id) as total_films
from store s
join inventory i on s.store_id = i.store_id
group by s.store_id;


