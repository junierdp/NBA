create database NBA;
use NBA;

create table Player(
	playerID int not null auto_increment,
    name varchar (50) not null,
    nickname varchar (50),
    teamID int not null,
    position varchar (50),
    number int not null,
    imagePlayer varchar(600),
    
    constraint pk_playerID primary key (playerID),
    constraint fk_teamID foreign key (teamID) references Team (teamID)
);

create table Team(
	teamID int not null auto_increment,
    teamName varchar (50),
    city varchar (50),
    image varchar(600),
    
    constraint pk_teamID primary key (teamID)
);
