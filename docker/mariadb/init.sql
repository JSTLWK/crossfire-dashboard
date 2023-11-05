CREATE DATABASE IF NOT EXISTS crossfire_tournaments_dev;
CREATE DATABASE IF NOT EXISTS crossfire_tournaments_dev_test;

GRANT ALL PRIVILEGES ON crossfire_tournaments_dev.* TO 'cft'@'%';
GRANT ALL PRIVILEGES ON crossfire_tournaments_dev_test.* TO 'cft'@'%';

FLUSH PRIVILEGES;
