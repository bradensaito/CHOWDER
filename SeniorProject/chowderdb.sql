create table accounts (
	id int not null,
	firstname varchar(50) not null,
	lastname varchar(50) not null,
	permissions int not null,
    username varchar(100) not null,
    pass varchar(256) not null,
	primary key (id)
);

create table digs (
	id int not null,
	digdate date not null,
	location varchar(100) not null,
	primary key (id)
);

create table `groups` (
	id int not null,
	dig_id int not null,
	account_id int not null,
	primary key (id, dig_id, account_id),
	foreign key (dig_id) references digs(id),
	foreign key (account_id) references accounts(id)
);

create table transects (
	id int not null,
	dig_id int not null,
	group_id int not null,
	starttime timestamp default current_timestamp,
	endtime timestamp default current_timestamp,
	startlat double not null,
	endlat double,
	startlong double not null,
	endlong double,
    orientation char(13) not null,
	primary key (id, dig_id),
	foreign key (dig_id) references digs(id)
);

create table sections (
	id int not null,
    transect_id int not null,
	primary key (id, transect_id),
	foreign key (transect_id) references transects(id)
);

create table clams (
	id int not null,
	section_id int not null,
	transect_id int not null,
    account_id int not null,
	size double not null,
	primary key (id),
    foreign key (section_id) references sections(id),
	foreign key (transect_id) references transects(id),
    foreign key (account_id) references accounts(id)
);