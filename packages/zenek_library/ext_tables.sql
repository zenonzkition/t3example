CREATE TABLE tx_zeneklibrary_domain_model_author (
	first_name varchar(255) NOT NULL DEFAULT '',
	last_name varchar(255) NOT NULL DEFAULT '',
	photo int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_zeneklibrary_domain_model_book (
	title varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	cover int(11) unsigned NOT NULL DEFAULT '0',
	author int(11) unsigned DEFAULT '0'
);
