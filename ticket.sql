create database ticket;
use ticket;
create table users (
	users		char(32)  	character set utf8,
	ChildEntrance    int,
    AdultEntrance    int,
    ChildBIG         int,
    AdultBIG         int,
    ChildFreePass    int,
    AdultFreePass    int,
    ChildAnnualPass  int,
    AdultAnnualPass  int,
    TotalCount       int
);
describe users;

