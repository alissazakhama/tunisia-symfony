-- Star ratings & comments for destination pages
-- destination_id stores the URL slug (e.g. tunis, djerba) used in /destinations/{id}
SHOW TABLES;
CREATE TABLE reviews (
    id INT AUTO_INCREMENT NOT NULL,
    destination_id VARCHAR(50) NOT NULL,
    user_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    comment TEXT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_reviews_destination (destination_id),
    CONSTRAINT fk_reviews_user FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
