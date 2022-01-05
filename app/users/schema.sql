DROP TABLE if exists users;
DROP TABLE if exists lists;
DROP TABLE if exists tasks;


CREATE TABLE users (
  id integer not null primary key autoincrement,
  name varchar not null,
  email varchar not null,
  password varchar not null,
  image text
);
CREATE TABLE lists (
  id integer not null primary key autoincrement,
  user_id integer not null,
  task_id integer not null,
  title varchar not null,
  foreign key (user_id) references users(id),
  foreign key (task_id) references tasks(id)
);
CREATE TABLE tasks (
  id integer not null primary key autoincrement,
  user_id integer not null,
  title varchar not null,
  list_id integer not null,
  description text,
  created date not null,
  due_date date not null,
  completed tinyint not null,
  foreign key (list_id) references lists(id),
  foreign key (user_id) references users(id)
);


