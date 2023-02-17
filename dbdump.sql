create table if not exists user_details
(
    id_user_details serial
        constraint user_details_pk
            primary key
        unique,
    name            varchar(100) not null,
    surname         varchar(100) not null
);

alter table user_details
    owner to dbuser;

create table if not exists users
(
    id_user         serial
        constraint users_pk
            primary key
        unique,
    email           varchar(255)      not null
        unique,
    password        varchar(255)      not null,
    id_user_details integer           not null
        constraint users_user_details_id_users_details_fk
            references user_details
            on update cascade on delete cascade,
    balance         integer default 0 not null
);

alter table users
    owner to dbuser;

create table if not exists categories
(
    id_category serial
        constraint categories_pk
            primary key
        unique,
    name        varchar(255) not null
);

alter table categories
    owner to dbuser;

create table if not exists transactions
(
    id_transaction serial
        constraint transactions_pk
            primary key
        unique,
    amount         double precision not null,
    title          varchar(255)     not null,
    id_category    integer          not null
        constraint transactions_categories_id_category_fk
            references categories,
    id_user        integer          not null
        constraint transactions_users_id_user_fk
            references users
);

alter table transactions
    owner to dbuser;

create table if not exists users_transactions
(
    id_user        integer not null
        constraint users_transactions_users_id_user_fk
            references users,
    id_transaction integer not null
        constraint users_transactions_transactions_id_transaction_fk
            references transactions
);

alter table users_transactions
    owner to dbuser;

create table if not exists user_limits
(
    id_user     integer          not null
        constraint user_limits_users_id_user_fk
            references users,
    id_category integer          not null
        constraint user_limits_categories_id_category_fk
            references categories,
    amount      double precision not null
);

alter table user_limits
    owner to dbuser;

insert into public.categories (id_category, name)
values  (1, 'Food'),
        (2, 'Entertainment'),
        (3, 'Education'),
        (4, 'Transport'),
        (5, 'Income');

insert into public.transactions (id_transaction, amount, title, id_category, id_user)
values  (27, 2000, 'wyplata', 5, 19),
        (33, -200, 'kino z kolegą', 2, 19),
        (34, -10, 'woda', 1, 19);

insert into public.user_details (id_user_details, name, surname)
values  (26, 'Kamil', 'Ślimak'),
        (29, 'Atak', 'Kata'),
        (43, 'Moc', 'Owocom');

insert into public.user_limits (id_user, id_category, amount)
values  (22, 1, 0),
        (22, 2, 0),
        (22, 3, 0),
        (22, 4, 0),
        (36, 1, 0),
        (36, 2, 0),
        (36, 3, 0),
        (36, 4, 0),
        (19, 1, 100),
        (19, 3, 200),
        (19, 4, 1000),
        (19, 2, 500);

insert into public.users (id_user, email, password, id_user_details, balance)
values  (19, 'kamilslimak@gmail.com', '202cb962ac59075b964b07152d234b70', 26, 0),
        (22, 'atakkata@gmail.com', '7815696ecbf1c96e6894b779456d330e', 29, 0),
        (36, 'mocowocom@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 43, 0);


