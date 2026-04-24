PRAGMA foreign_keys = ON;

CREATE TABLE User (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    role TEXT NOT NULL CHECK(role IN ('Officer', 'Supervisor', 'Admin'))
);

CREATE TABLE Supplier (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    tin TEXT NOT NULL UNIQUE CHECK(length(tin) = 10),
    bank_details TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Batch (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    batch_number TEXT UNIQUE NOT NULL,
    status TEXT NOT NULL CHECK(status IN ('Open', 'Finalized')) DEFAULT 'Open',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Payment (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    supplier_id INTEGER NOT NULL,
    batch_id INTEGER,
    invoice_number TEXT NOT NULL,
    amount REAL NOT NULL CHECK(amount > 0),
    status TEXT NOT NULL CHECK(status IN ('Draft', 'Ready', 'Batched', 'Processed')) DEFAULT 'Draft',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(supplier_id) REFERENCES Supplier(id),
    FOREIGN KEY(batch_id) REFERENCES Batch(id)
);

CREATE TABLE Document (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    payment_id INTEGER NOT NULL,
    file_path TEXT NOT NULL,
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(payment_id) REFERENCES Payment(id)
);

CREATE TABLE BatchAuditLog (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    batch_id INTEGER NOT NULL,
    event TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(batch_id) REFERENCES Batch(id)
);

-- Insert default admin user (password: admin123)
INSERT INTO User (username, password, role) VALUES ('admin', '$2y$10$QTKSP06lAB7lrLFqo0REYujH6rC.SJBv0LA4E18PLSoxYwXTcNo56', 'Admin');
INSERT INTO User (username, password, role) VALUES ('officer', '$2y$10$QTKSP06lAB7lrLFqo0REYujH6rC.SJBv0LA4E18PLSoxYwXTcNo56', 'Officer');
