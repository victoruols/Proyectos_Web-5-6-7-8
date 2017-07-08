//Creo las 4 tablas

CREATE TABLE cities_locations(geoname_id varchar(100),
locale_code varchar(100),
continent_code varchar(100),
continent_name varchar(100),
country_iso_code varchar(100),
country_name varchar(100),
subdivision_1_iso_code varchar(100),
subdivision_1_name varchar(100),
subdivision_2_iso_code varchar(100),
subdivision_2_name varchar(100),
city_name varchar(100),
metro_code varchar(100),
time_zone varchar(100),
primary key(geoname_id)
) ENGINE = InnoDB;



CREATE TABLE cities_blocks_ip4(
network varchar(100),
geoname_id varchar(100),
registered_country_geoname_id varchar(100),
represented_country_geoname_id varchar(100),
is_anonymous_proxy varchar(100),
is_satellite_provider varchar(100),
postal_code varchar(100),
latitude varchar(100),
longitude varchar(100),
accuracy_radius varchar(100)
) ENGINE = InnoDB;



CREATE TABLE countries_locations(
geoname_id varchar(100),
locale_code varchar(100),
continent_code varchar(100),
continent_name varchar(100),
country_iso_code varchar(100),
country_name varchar(100),
primary key(geoname_id)
) ENGINE = InnoDB;



CREATE TABLE countries_blocks_ip4(
network varchar(100),
geoname_id varchar(100),
registered_country_geoname_id varchar(100),
represented_country_geoname_id varchar(100),
is_anonymous_proxy varchar(100),
is_satellite_provider varchar(100)
) ENGINE = InnoDB;




//Importacion de los datos  a las tablas:

LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 5.7/Uploads/GeoLite2-City-Locations-es.csv' INTO TABLE cities_locations FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n' IGNORE 1 ROWS;


LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 5.7/Uploads/GeoLite2-City-Blocks-IPv4.csv' INTO TABLE cities_blocks_ip4 FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n' IGNORE 1 ROWS;


LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 5.7/Uploads/GeoLite2-Country-Locations-es.csv' INTO TABLE countries_locations FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n' IGNORE 1 ROWS;


LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 5.7/Uploads/GeoLite2-Country-Blocks-IPv4.csv' INTO TABLE countries_blocks_ip4 FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n' IGNORE 1 ROWS;




//Select

select cities_locations.city_name, cities_blocks_ip4.latitude, cities_blocks_ip4.longitude 
	from cities_locations, cities_blocks_ip4 
	where cities_locations.geoname_id = cities_blocks_ip4.geoname_id and cities_locations.geoname_id <> '' 
	AND cities_locations.geoname_id is not null 
	AND (cities_blocks_ip4.network BETWEEN '83.43.1.0/25' AND '83.43.204.0/24');





