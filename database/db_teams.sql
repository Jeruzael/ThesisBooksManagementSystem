create table themeColor(
	colorId int primary key auto_increment,
    color_1 VARCHAR(7),
    color_2 VARCHAR(7),
    color_3 VARCHAR(7),
    color_4 VARCHAR(7),
    color_5 VARCHAR(7),
    color_6 VARCHAR(7),
	color_7 VARCHAR(7),
	color_8 VARCHAR(7),
	color_9 VARCHAR(7)
);
insert into themecolor(color_1,color_2,color_3,color_4,color_5,color_6,color_7,color_8,color_9)
values("#88C1FF","#97C7FB", "#AED5FF", "#FF6048","#FD8978","#4A63FF","#7788F4","#E5E5E5","#F8FAFF");

create table teamsLogo(
	logoId int primary key auto_increment,
    logo_1 VARCHAR(20),
    logo_2 VARCHAR(20),
    logo_3 VARCHAR(20),
    logo_4 VARCHAR(20)
);
insert into teamsLogo(logo_1,logo_2,logo_3,logo_4)
values("teamsLogo_1.png","teamsLogo_2.png", "teamsLogo_3.png", "teamsLogo_4.png");

create table teamsPoster(
	posterId int primary key auto_increment,
    poster_1 VARCHAR(20),
    poster_2 VARCHAR(20),
    poster_3 VARCHAR(20),
    poster_4 VARCHAR(20),
    poster_5 VARCHAR(20)
);
insert into teamsPoster(poster_1,poster_2,poster_3,poster_4,poster_5)
values("poster_1.png","poster_2.png", "poster_3.png", "poster_4.png","poster_5.png");

create table teamsBackground(
	backgroundId int primary key auto_increment,
    background_1 VARCHAR(50),
    background_2 VARCHAR(50)
);
insert into teamsBackground(background_1,background_2)
values("rgba(119, 136, 244, 0.21)","rgba(174, 213, 255, 0.53)");

create table thesisLibrary(
	bookId int primary key auto_increment,
    bookCover varchar(100) default "bookdefaultcover.png",
    bookTitle varchar(255) not null,
    bookAuthor varchar(255) not null,
    bookProfessor varchar(255),
    bookPublished date not null,
    bookStatus varchar(50) default "available",
    bookStamp datetime default current_timestamp
);
insert into thesisLibrary(bookTitle,bookAuthor,bookPublished)
values
("cyber-physical security of a chemical plant","prakash rao dunaka","2017-06-29");

insert into thesisLibrary(bookTitle,bookAuthor,bookPublished,bookProfessor)
values
("ziware mobile virtualbox - mobile application","kevin g. tolentino & jon michael r. zulueta","2013-04-01","prof. jonathan velarde"),
("yungib","caranto, maria jessieka, diaz, jean carlo & ombrog, rose","2018-03-01","prof. genalyn d. villafuerte"),
("x10 excel microsoft office excel 2010 computer aided instruction","balanon, bryan, bronola, ronjie, mahagnay, sheam japhet & maquinana, lywin","2012-03-01","prof. jonathan velarde"),
("world break","serrano, jayson, estabaya & dan brandon","2018-03-01","prof. genalyn d. villafuerte"),
("web-based library system with mobile application sms / email verification and notification, with an interactive library book map of legal education board","guerrero, maria kriana, lambo, jerwin, santos, mark louie, vicente & maria patricia shayne","2019-03-01","prof. vicente tabacolde"),
("web-based courier tracking system for xeud corporation","ferrer, neve yasmin, ishida, marv, santos, anne & juan, aldrin","2019-03-01","prof. michael tan");

create table teamsuser(
	userId int primary key auto_increment,
    userFirstname varchar(255) not null,
    userLastname varchar(255) not null,
    userStamp datetime default current_timestamp
    
);
insert into teamsuser(userfirstname,userlastname)
values
("jeffrix", "briol"),
("danica", "cabullo"),
("gabriel", "napoto"),
("alexander", "caberto"),
("kevin", "corpin"),
("sean kim", "ebarle"),
("jerusael", "dumale");

create table thesisrequest(
	requestId int primary key auto_increment,
    requestBookId int not null,
    requesterId int not null,
    requestStamp datetime default current_timestamp,
    foreign key (requestBookId) REFERENCES thesisLibrary(bookId),
    foreign key (requesterId) REFERENCES teamsuser(userId)
);
insert into thesisrequest(requestBookId,requesterId)
values
(1,5),
(5,6),
(2,4),
(6,1),
(3,3);
