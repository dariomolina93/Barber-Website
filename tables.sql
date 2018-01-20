
create database if not exists Barber_Products;

use Barber_Products;

create table if not exists Products(
    ID integer not null auto_increment primary key,
    name varchar(250) not null,
    picture varchar(500) not null,
    quantity integer not null check( quantity > 0),
    price double not null check(price > 0.0),
    category varchar(100) not null
);