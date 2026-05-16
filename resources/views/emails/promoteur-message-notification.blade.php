<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #fc3131;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 0 0 8px 8px;
        }
        .message-box {
            background: white;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 4px solid #fc3131;
        }
        .property-info {
            background: #e8f4fd;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .btn {
            display: inline-block;
            background: #fc3131;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Nouveau message reçu</h1>
        <p>Vous avez reçu un nouveau message concernant votre propriété</p>
    </div>
    
    <div class="content">
        <div class="property-info">
            <h3>Propriété concernée :</h3>
            <p><strong>Référence :</strong> {{ $property->ref }}</p>
            <p><strong>Titre :</strong> {{ $property->title }}</p>
            <p><strong>Localisation :</strong> {{ $property->city->name }}, {{ $property->area->name }}</p>
        </div>
        
        <div class="message-box">
            <h3>Message de {{ $message->sender_name }}</h3>
            <p><strong>Email :</strong> {{ $message->sender_email }}</p>
            <p><strong>Téléphone :</strong> {{ $message->sender_phone }}</p>
            <p><strong>Date :</strong> {{ $message->formatted_created_at }}</p>
            <hr>
            <p><strong>Message :</strong></p>
            <p>{{ $message->message }}</p>
        </div>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('promoteur.messages.show', $message->id) }}" class="btn">
                Voir le message dans votre dashboard
            </a>
        </div>
    </div>
    
    <div class="footer">
        <p>Cet email a été envoyé automatiquement par le système de messagerie.</p>
        <p>Pour répondre, connectez-vous à votre dashboard promoteur.</p>
    </div>
</body>
</html> 