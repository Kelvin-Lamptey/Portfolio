CREATE TABLE contacts (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100),
    `email` VARCHAR(100),
    `project_details` TEXT,
    `submitted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);