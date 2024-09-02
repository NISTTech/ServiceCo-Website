CREATE TABLE service_groups (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    logo VARCHAR(255) NOT NULL
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

-- 5. Insert data into the service_groups table
INSERT INTO service_groups (name, slug, logo) VALUES
('Anglewishes', 'anglewishes', 'anglewishes/logo.png'),
('Arc', 'arc', 'arc/logo.png'),
('Baansaijai', 'baansaijai', 'baansaijai/logo.png'),
('Beatasone', 'beatasone', 'beatasone/logo.png'),
('Catnist', 'catnist', 'catnist/logo.png'),
('Cof', 'cof', 'cof/logo.png'),
('Connecting Communities', 'connectingcommunities', 'connectingcommunities/logo.png'),
('Cured', 'cured', 'cured/logo.png'),
('Eco', 'eco', 'eco/logo.png'),
('Edibubble', 'edibubble', 'edibubble/logo.png'),
('Fairnist', 'fairnist', 'fairnist/logo.png'),
('Farmers Market', 'farmersmarket', 'farmersmarket/logo.png'),
('Fashionist', 'fashionist', 'fashionist/logo.png'),
('Feminist', 'feminist', 'feminist/logo.png'),
('Forest Rangers', 'forestrangers', 'forestrangers/logo.png'),
('Free to Be', 'freetobe', 'freetobe/logo.png'),
('Friends of the Immanuel Orchestra', 'friendsoftheimmanuleorchestra', 'friendsoftheimmanuleorchestra/logo.png'),
('Greenlight', 'greenlight', 'greenlight/logo.png'),
('Helping Hearts', 'helpinghearts', 'helpinghearts/logo.png'),
('Mushie Mushie', 'mushiemushie', 'mushiemushie/logo.png'),
('Nest', 'nest', 'nest/logo.png'),
('Nistcha', 'nistcha', 'nistcha/logo.png'),
('Nist Community Market', 'nistcomunitymarket', 'nistcomunitymarket/logo.png'),
('Nist Tech', 'nisttech', 'nisttech/logo.png'),
('Operation Smile', 'operationsmile', 'operationsmile/logo.png'),
('PFN', 'pfn', 'pfn/logo.png'),
('Phuliphay', 'phuliphay', 'phuliphay/logo.png'),
('Priceless', 'priceless', 'priceless/logo.png'),
('Rescued Glass', 'rescuedglass', 'rescuedglass/logo.png'),
('Revive', 'revive', 'revive/logo.png'),
('Rooftop Garden', 'rooftopgarden', 'rooftopgarden/logo.png'),
('Soap', 'soap', 'soap/logo.png'),
('Step Up', 'stepup', 'stepup/logo.png'),
('The Falconer', 'thefalconer', 'thefalconer/logo.png'),
('Tusk', 'tusk', 'tusk/logo.png'),
('Wellnist', 'wellnist', 'wellnist/logo.png'),
('Wish Together', 'wishtogether', 'wishtogether/logo.png'),
('Woof', 'woof', 'woof/logo.png');

-- Insert data into the products table
INSERT INTO products (service_group_id, name, description, price, image) VALUES
-- (1, 'Angel Bracelet', 'Handmade bracelet crafted with care and love.', 19.99, 'anglewishes/angel_bracelet.png'),