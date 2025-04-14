-- 🚗 Vehicle Types
INSERT INTO vehicule_type (name) VALUES 
('sedan'), 
('minivan'), 
('suv'), 
('crossover'), 
('pickup'), 
('cabriolet');

-- 🛠️ Equipment
INSERT INTO equipment (name) VALUES 
('GPS'), 
('Bluetooth'), 
('Sièges chauffants'), 
('Caméra de recul'), 
('Toit ouvrant');

-- 🚙 Vehicles
INSERT INTO vehicule (brand, model, year, price_per_day, doors, fuel_type, air_conditioning, seats, transmission, vehicule_type_id) VALUES
('Toyota', 'Corolla', 2021, 40.00, 4, 'essence', TRUE, 5, 'automatique', 1),
('Honda', 'Odyssey', 2022, 65.00, 5, 'essence', TRUE, 7, 'automatique', 2),
('Jeep', 'Wrangler', 2023, 80.00, 3, 'diesel', TRUE, 5, 'manuelle', 3),
('Mazda', 'CX-5', 2022, 55.00, 5, 'essence', TRUE, 5, 'automatique', 4),
('Ford', 'F-150', 2021, 75.00, 4, 'diesel', TRUE, 5, 'automatique', 5),
('BMW', '4 Series Cabriolet', 2023, 95.00, 2, 'essence', TRUE, 4, 'automatique', 6),
('Hyundai', 'Tucson', 2022, 50.00, 5, 'hybride', TRUE, 5, 'automatique', 4),
('Mercedes', 'E-Class', 2023, 90.00,  4, 'diesel', TRUE, 5, 'automatique', 1),
('Volkswagen', 'Multivan', 2021, 70.00,  5, 'essence', TRUE, 7, 'automatique', 2);

-- 📸 Vehicle Photos (1 per vehicle for now)
INSERT INTO vehicule_photo (vehicule_id, image_url, display_order) VALUES
(1, 'images/toyota_corolla_1.jpg', 0),
(2, 'images/honda_odyssey_1.jpg', 0),
(3, 'images/jeep_wrangler_1.jpg', 0),
(4, 'images/mazda_cx5_1.jpg', 0),
(5, 'images/ford_f150_1.jpg', 0),
(6, 'images/bmw_4series_cab_1.jpg', 0),
(7, 'images/hyundai_tucson_1.jpg', 0),
(8, 'images/mercedes_eclass_1.jpg', 0),
(9, 'images/vw_multivan_1.jpg', 0);

-- 🔧 Equipments per vehicle (some sample associations)
INSERT INTO vehicule_equipment (vehicule_id, equipment_id) VALUES
(1, 1), (1, 2),
(2, 1), (2, 4),
(3, 2), (3, 3),
(4, 1), (4, 5),
(5, 3), (5, 4),
(6, 1), (6, 5),
(7, 2), (7, 3),
(8, 1), (8, 4), (8, 5),
(9, 1), (9, 2), (9, 3);

-- 📅 Reservations (2 per vehicle)
INSERT INTO reservation (email, vehicule_id, start_date, end_date, total_price) VALUES
('alice@example.com', 1, '2025-04-20', '2025-04-23', 120.00),
('bob@example.com', 1, '2025-05-10', '2025-05-13', 120.00),

('charlie@example.com', 2, '2025-04-25', '2025-04-30', 325.00),
('diane@example.com', 2, '2025-06-01', '2025-06-05', 260.00),

('ethan@example.com', 3, '2025-05-03', '2025-05-06', 240.00),
('fay@example.com', 3, '2025-06-10', '2025-06-12', 160.00),

('george@example.com', 4, '2025-04-22', '2025-04-24', 110.00),
('hannah@example.com', 4, '2025-05-12', '2025-05-14', 110.00),

('ian@example.com', 5, '2025-04-28', '2025-05-02', 300.00),
('julia@example.com', 5, '2025-06-03', '2025-06-07', 300.00),

('karl@example.com', 6, '2025-05-15', '2025-05-17', 190.00),
('lara@example.com', 6, '2025-06-01', '2025-06-04', 285.00),

('matt@example.com', 7, '2025-04-18', '2025-04-21', 150.00),
('nina@example.com', 7, '2025-05-22', '2025-05-25', 150.00),

('oliver@example.com', 8, '2025-04-27', '2025-04-30', 270.00),
('penny@example.com', 8, '2025-05-15', '2025-05-18', 270.00),

('quentin@example.com', 9, '2025-04-15', '2025-04-18', 210.00),
('rita@example.com', 9, '2025-05-20', '2025-05-23', 210.00);