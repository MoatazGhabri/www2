@extends('layouts.app')
@section('pageTitle', "Contactez RM Immobilier")
@section('content')

<div class="contact-section">
    <div class="contact-container">
        <div class="contact-card">
            <!-- Contact Info Side with Map -->
            <div class="contact-info-side">
                <div class="contact-info-group">
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Siège Social</h3>
                                <p>Rue Abdallah Farhat Dar Chabene 8075 Nabeul</p>
                        </div>  
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Téléphone</h3>
                            <p>+216 27 040 938</p>

                        </div>
                      
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Email</h3>
                            <p>rmimmobilier24@gmail.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h3>Horaires de travail</h3>
                            <p>Lun - Sam (08h00 - 17h00)</p>
                        </div>
                    </div>
                </div>
                
               
            </div>
            
            <!-- Contact Form Side -->
            <div class="contact-form-side">
                <h2 class="contact-heading">Contactez RM Immobilier</h2>
                <form method="post" action="#" id="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" class="contact-input" name="name" placeholder="Votre Nom" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="contact-input" name="email" placeholder="Votre Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="contact-input" name="subject" placeholder="Sujet" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="contact-input contact-textarea" placeholder="Écrivez votre message"></textarea>
                    </div>
                    <button type="submit" class="contact-submit">
                        Envoyer <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
<style>
 /* Green Gradient Contact Page */
:root {
    --primary-orange: var(--color-main);
    --primary-light: var(--color-main);
    --primary-dark: var(--color-main);
    --gradient-orange: linear-gradient(135deg, var(--primary-orange) 0%, var(--primary-light) 100%);
    --gradient-hover: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-orange) 100%);
}

.contact-section {
    background-color: #f0f7ff;
    padding: 5rem 0;
    margin-top: 120px;
}

.contact-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.contact-card {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    background: white;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(158, 124, 1, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 1px solid var(--color-main);
}

.contact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(158, 124, 1, 0.15);
}

.contact-info-side {
    padding: 2.5rem;
    color: white;
    display: flex;
    flex-direction: column;
}

.contact-info-group {
    flex: 1;
}

.contact-info-item {
    display: flex;
    align-items: flex-start;
    gap: 1.25rem;
    margin-bottom: 2rem;
    transition: transform 0.2s ease;
}

.contact-info-item:hover {
    transform: translateX(5px);
}

.contact-icon {
    width: 3rem;
    height: 3rem;
    background: var(--gradient-orange);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
    transition: background 0.3s ease;
}


.contact-details h3 {
    font-size: 1.125rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--color-main);
}

.contact-details p {
    opacity: 0.9;
    line-height: 1.6;
    color: var(--color-main);
}

/* Compact Map Integration */
.contact-map {
    margin-top: 2rem;
    border-radius: 0.75rem;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(158, 124, 1, 0.1);
    transition: all 0.3s ease;
    height: 200px;
    position: relative;
    border: 2px solid rgba(255, 255, 255, 0.2);
}

.contact-map:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(158, 124, 1, 0.2);
    border-color: rgba(255, 255, 255, 0.3);
}

.contact-map iframe {
    width: 100%;
    height: 100%;
    border: 0;
}

/* Form Side Styling */
.contact-form-side {
    padding: 2.5rem;
}

.contact-heading {
    font-size: 2rem;
    font-weight: 700;
    color: var(--color-main);
    margin-bottom: 1.5rem;
    position: relative;
}

.contact-heading::after {
    content: '';
    position: absolute;
    bottom: -0.75rem;
    left: 0;
    width: 3rem;
    height: 0.25rem;
    background: var(--gradient-orange);
    border-radius: 0.25rem;
}

.contact-input {
    width: 100%;
    padding: 1rem;
        border: 1px solid var(--color-main);
    background-color: #f8fafc;
    border-radius: 0.5rem;
    margin-bottom: 1.25rem;
    transition: all 0.3s ease;
    font-size: 1rem;
}

.contact-input:focus {
    border-color: var(--primary-orange);
    box-shadow: 0 0 0 3px rgba(158, 124, 1, 0.2);
    outline: none;
    background-color: white;
}

.contact-textarea {
    min-height: 10rem;
    resize: vertical;
}

.contact-submit {
    background: var(--gradient-orange);
    color: white;
    border: none;
    padding: 1rem 2rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.contact-submit:hover {
    background: var(--gradient-orange);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(158, 124, 1, 0.3);
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-card {
        grid-template-columns: 1fr;
    }
    
    .contact-info-side {
        padding: 2rem;
    }
    
    .contact-map {
        height: 250px;
    }
}

@media (max-width: 768px) {
    .contact-section {
        margin-top: 90px;
    }
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.contact-info-item, .contact-form-side, .contact-map {
    animation: fadeIn 0.6s ease forwards;
}

.contact-info-item:nth-child(1) { animation-delay: 0.1s; }
.contact-info-item:nth-child(2) { animation-delay: 0.2s; }
.contact-info-item:nth-child(3) { animation-delay: 0.3s; }
.contact-info-item:nth-child(4) { animation-delay: 0.4s; }
.contact-map { animation-delay: 0.5s; }
.contact-form-side { animation-delay: 0.6s; }
</style>