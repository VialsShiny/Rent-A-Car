-- TABLE : Type de véhicule
CREATE TABLE vehicule_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

-- TABLE : Véhicule
CREATE TABLE vehicule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    year INT NOT NULL,
    price_per_day DECIMAL(10, 2) NOT NULL,
    doors INT,
    fuel_type ENUM('essence', 'diesel', 'électrique', 'hybride') NOT NULL,
    air_conditioning BOOLEAN DEFAULT FALSE,
    seats INT,
    transmission ENUM('automatique', 'manuelle') NOT NULL,
    vehicule_type_id INT,
    FOREIGN KEY (vehicule_type_id) REFERENCES vehicule_type(id) ON DELETE SET NULL
);

-- TABLE : Photo des véhicules
CREATE TABLE vehicule_photo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicule_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    display_order INT DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(id) ON DELETE CASCADE
);

CREATE TABLE vehicule_availability (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicule_id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    is_available BOOLEAN NOT NULL DEFAULT TRUE,
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(id) ON DELETE CASCADE
);

-- TABLE : Réservation
CREATE TABLE reservation (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    vehicule_id INT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'confirmed', 'cancelled', 'completed') NOT NULL DEFAULT 'pending',
    total_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(id) ON DELETE CASCADE
);

-- TABLE : Equipements
CREATE TABLE equipment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

-- TABLE : Relation véhicule <-> équipement
CREATE TABLE vehicule_equipment (
    vehicule_id INT NOT NULL,
    equipment_id INT NOT NULL,
    PRIMARY KEY (vehicule_id, equipment_id),
    FOREIGN KEY (vehicule_id) REFERENCES vehicule(id) ON DELETE CASCADE,
    FOREIGN KEY (equipment_id) REFERENCES equipment(id) ON DELETE CASCADE
);