show tables;

select * from rental;

select r.rental_id, c.first_name, c.last_name, r.rental_date
from rental r
join customer c on r.customer_id = c.customer_id;

select  f.title
from inventory i
join film f on i.film_id = f.film_id;

select a.first_name, a.last_name, f.title as film_name
from actor a
join film_actor fa on a.actor_id = fa.actor_id
join film f on fa.film_id = f.film_id;

select c.first_name, c.last_name, a.address
from customer c
join address a on c.address_id = a.address_id;

select c.first_name, c.last_name
from customer c
left join rental r on c.customer_id = r.customer_id
where r.rental_id is null;

select a.first_name, a.last_name, actor_films.film_count
from actor a
join (
    select fa.actor_id, COUNT(fa.film_id) AS film_count
    from film_actor fa
    group by fa.actor_id
)  actor_films
on a.actor_id = actor_films.actor_id
where actor_films.film_count > 10;

select title, rental_rate
from film
where rental_rate > (select avg(rental_rate) from film);


select rating, COUNT(*)  film_count
from film
group by rating;

select first_name, last_name, rental_count
from (
    select c.first_name, c.last_name, COUNT(r.rental_id)  rental_count
    from customer c
    join rental r on c.customer_id = r.customer_id
    group by c.customer_id
) customer_rentals
where rental_count >= 10;

