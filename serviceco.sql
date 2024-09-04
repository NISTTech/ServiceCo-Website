CREATE TABLE service_groups (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    logo VARCHAR(255) NOT NULL,
    site_section VARCHAR(255) NOT NULL
);

-- create products table
CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    service_group_id INT(11) NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    FOREIGN KEY (service_group_id) REFERENCES service_groups(id) ON DELETE CASCADE
);

-- insert data into the service_groups table
INSERT INTO service_groups (name, logo, site_section) VALUES
('anglewishes', 'serviceco/servicegroups/anglewishes/logo.png', 'serviceco/servicegroups/anglewishes/index.php'),
('arc', 'serviceco/servicegroups/arc/logo.png', 'serviceco/servicegroups/arc/index.php'),
('baansaijai', 'serviceco/servicegroups/baansaijai/logo.png', 'serviceco/servicegroups/baansaijai/index.php'),
('beatasone', 'serviceco/servicegroups/beatasone/logo.png', 'serviceco/servicegroups/beatasone/index.php'),
('catnist', 'serviceco/servicegroups/catnist/logo.png', 'serviceco/servicegroups/catnist/index.php'),
('cof', 'serviceco/servicegroups/cof/logo.png', 'serviceco/servicegroups/cof/index.php'),
('connecting communities', 'serviceco/servicegroups/connectingcommunities/logo.png', 'serviceco/servicegroups/connectingcommunities/index.php'),
('cured', 'serviceco/servicegroups/cured/logo.png', 'serviceco/servicegroups/cured/index.php'),
('eco', 'serviceco/servicegroups/eco/logo.png', 'serviceco/servicegroups/eco/index.php'),
('edibubble', 'serviceco/servicegroups/edibubble/logo.png', 'serviceco/servicegroups/edibubble/index.php'),
('fairnist', 'serviceco/servicegroups/fairnist/logo.png', 'serviceco/servicegroups/fairnist/index.php'),
('farmers market', 'serviceco/servicegroups/farmersmarket/logo.png', 'serviceco/servicegroups/farmersmarket/index.php'),
('fashionist', 'serviceco/servicegroups/fashionist/logo.png', 'serviceco/servicegroups/fashionist/index.php'),
('feminist', 'serviceco/servicegroups/feminist/logo.png', 'serviceco/servicegroups/feminist/index.php'),
('forest rangers', 'serviceco/servicegroups/forestrangers/logo.png', 'serviceco/servicegroups/forestrangers/index.php'),
('free to be', 'serviceco/servicegroups/freetobe/logo.png', 'serviceco/servicegroups/freetobe/index.php'),
('friends of the immanuel orchestra', 'serviceco/servicegroups/friendsoftheimmanuleorchestra/logo.png', 'serviceco/servicegroups/friendsoftheimmanuleorchestra/index.php'),
('greenlight', 'serviceco/servicegroups/greenlight/logo.png', 'serviceco/servicegroups/greenlight/index.php'),
('helping hearts', 'serviceco/servicegroups/helpinghearts/logo.png', 'serviceco/servicegroups/helpinghearts/index.php'),
('mushie mushie', 'serviceco/servicegroups/mushiemushie/logo.png', 'serviceco/servicegroups/mushiemushie/index.php'),
('nest', 'serviceco/servicegroups/nest/logo.png', 'serviceco/servicegroups/nest/index.php'),
('nistcha', 'serviceco/servicegroups/nistcha/logo.png', 'serviceco/servicegroups/nistcha/index.php'),
('nist community market', 'serviceco/servicegroups/nistcomunitymarket/logo.png', 'serviceco/servicegroups/nistcomunitymarket/index.php'),
('nist tech', 'serviceco/servicegroups/nisttech/logo.png', 'serviceco/servicegroups/nisttech/index.php'),
('operation smile', 'serviceco/servicegroups/operationsmile/logo.png', 'serviceco/servicegroups/operationsmile/index.php'),
('pfn', 'serviceco/servicegroups/pfn/logo.png', 'serviceco/servicegroups/pfn/index.php'),
('phuliphay', 'serviceco/servicegroups/phuliphay/logo.png', 'serviceco/servicegroups/phuliphay/index.php'),
('priceless', 'serviceco/servicegroups/priceless/logo.png', 'serviceco/servicegroups/priceless/index.php'),
('rescued glass', 'serviceco/servicegroups/rescuedglass/logo.png', 'serviceco/servicegroups/rescuedglass/index.php'),
('revive', 'serviceco/servicegroups/revive/logo.png', 'serviceco/servicegroups/revive/index.php'),
('rooftop garden', 'serviceco/servicegroups/rooftopgarden/logo.png', 'serviceco/servicegroups/rooftopgarden/index.php'),
('soap', 'serviceco/servicegroups/soap/logo.png', 'serviceco/servicegroups/soap/index.php'),
('step up', 'serviceco/servicegroups/stepup/logo.png', 'serviceco/servicegroups/stepup/index.php'),
('the falconer', 'serviceco/servicegroups/thefalconer/logo.png', 'serviceco/servicegroups/thefalconer/index.php'),
('tusk', 'serviceco/servicegroups/tusk/logo.png', 'serviceco/servicegroups/tusk/index.php'),
('wellnist', 'serviceco/servicegroups/wellnist/logo.png', 'serviceco/servicegroups/wellnist/index.php'),
('wish together', 'serviceco/servicegroups/wishtogether/logo.png', 'serviceco/servicegroups/wishtogether/index.php'),
('woof', 'serviceco/servicegroups/woof/logo.png', 'serviceco/servicegroups/woof/index.php');

-- insert data into the products table
INSERT INTO products (service_group_id, name, description, price, image) VALUES
-- examples (Replace with real products and prices.) 
(1, 'Angel Bracelet', 'Handmade bracelet crafted with care and love.', 19.99, 'anglewishes/products/angel_bracelet.png'),