<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact - Nouvelle Demande</title>
    <style>
        body {
            background: #f8f8f8;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(252,49,49,0.08);
            overflow: hidden;
            border: 1px solid #fc3131;
        }
        .header {
            background: linear-gradient(90deg, #fc3131 60%, #ff6f61 100%);
            color: #fff;
            padding: 24px 32px 16px 32px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2rem;
            letter-spacing: 1px;
        }
        .content {
            padding: 32px;
        }
        .label {
            color: #fc3131;
            font-weight: bold;
            margin-bottom: 2px;
            display: block;
        }
        .value {
            color: #222;
            margin-bottom: 18px;
            font-size: 1.05rem;
        }
        .message {
            background: #fff6f6;
            border-left: 4px solid #fc3131;
            padding: 16px;
            color: #b71c1c;
            font-style: italic;
            margin-top: 18px;
        }
        @media (max-width: 600px) {
            .container, .content { padding: 16px !important; }
            .header { padding: 16px !important; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nouvelle Demande de Contact</h1>
        </div>
        <div class="content">
            <span class="label">Nom & Prénom:</span>
            <div class="value">{{ $details['name'] }}</div>

            <span class="label">Email:</span>
            <div class="value">{{ $details['email'] }}</div>

            <span class="label">Téléphone:</span>
            <div class="value">{{ $details['phone'] }}</div>

            <div class="label">Message:</div>
            <div class="message">{{ $details['message'] }}</div>

            <div style="text-align:center; margin-top:32px;">
                <a href="{{ url('propertie_by_id/' . $details['property_id']) }}" 
                   style="display:inline-block; padding:14px 32px; background:#fc3131; color:#fff; border-radius:6px; text-decoration:none; font-weight:bold; font-size:1.1rem; box-shadow:0 2px 8px rgba(252,49,49,0.10); transition:background 0.2s;">
                    Voir l'annonce 
                </a>
            </div>
        </div>
    </div>
</body>
</html>
