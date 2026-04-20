<!DOCTYPE html>
<html>
<head><title>FWAS</title></head>
<body>
    <h1>Finance Workflow Assistance System</h1>
    <nav>
        <a href="/dashboard">Dashboard</a> | 
        <a href="/suppliers">Suppliers</a> | 
        <a href="/payments">Payments</a> | 
        <a href="/batches">Batches</a> | 
        <a href="/logout">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a>
    </nav>
    <hr>
