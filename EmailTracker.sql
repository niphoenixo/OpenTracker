CREATE TABLE EmailTracker (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    campaignID int(10),
    subscriptionID varchar(100),
    timestamp TIMESTAMP DEFAULT NOW()
);

