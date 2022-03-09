create table themeColor(
	colorId int primary key,
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
insert into themecolor(colorId,color_1,color_2,color_3,color_4,color_5,color_6,color_7,color_8,color_9)
values(1,"#88C1FF","#97C7FB", "#AED5FF", "#FF6048","#FD8978","#4A63FF","#7788F4","#E5E5E5","#F8FAFF");

create table teamsLogo(
	logoId int primary key,
    logo_1 VARCHAR(20),
    logo_2 VARCHAR(20),
    logo_3 VARCHAR(20),
    logo_4 VARCHAR(20)
);
insert into teamsLogo(logoId,logo_1,logo_2,logo_3,logo_4)
values(1,"teamsLogo_1.png","teamsLogo_2.png", "teamsLogo_3.png", "teamsLogo_4.png");