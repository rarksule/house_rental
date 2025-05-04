<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANGER! House Rental System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .danger-header {
            background-color: #dc3545;
            color: white;
            padding: 20px;
            text-align: center;
            animation: blink 0.5s step-end infinite alternate;
        }
        @keyframes blink {
            50% { background-color: #ff0000; }
        }
        .laughing-emoji {
            position: fixed;
            font-size: 2rem;
            animation: roll 5s linear infinite;
            z-index: 1000;
        }
        @keyframes roll {
            0% { transform: translateX(-50px) rotate(0deg); left: 0%; top: 10%; }
            25% { transform: translateX(-50px) rotate(360deg); left: 25%; top: 30%; }
            50% { transform: translateX(-50px) rotate(720deg); left: 50%; top: 60%; }
            75% { transform: translateX(-50px) rotate(1080deg); left: 75%; top: 30%; }
            100% { transform: translateX(-50px) rotate(1440deg); left: 100%; top: 10%; }
        }
        .system-failure {
            border: 3px dashed red;
            padding: 20px;
            margin: 20px 0;
            background-color: #ffe6e6;
        }
        .glitch {
            animation: glitch 1s linear infinite;
        }
        @keyframes glitch {
            0% { transform: translate(0); }
            20% { transform: translate(-5px, 5px); }
            40% { transform: translate(-5px, -5px); }
            60% { transform: translate(5px, 5px); }
            80% { transform: translate(5px, -5px); }
            100% { transform: translate(0); }
        }
    </style>
</head>
<body>
    <div class="danger-header">
        <h1 class="glitch">⚠️ DANGER! SYSTEM FAILURE DETECTED ⚠️</h1>
        <h2>APRIL FOOL! HAHAHA! 🤣</h2>
    </div>

    <div class="container mt-5">
        <div class="system-failure text-center">
            <h3 class="text-danger">CRITICAL ERROR IN HOUSE RENTAL MANAGEMENT SYSTEM</h3>
            <p class="lead">Just kidding! Happy April Fool's Day! 🎉</p>
            <p>Your house rental website is coming soon... maybe... 😜</p>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        🏠 Fake Feature 1: AI Tenant Selector
                    </div>
                    <div class="card-body">
                        <p>Our advanced AI system rejects 99% of applicants based on their zodiac sign compatibility with the landlord.</p>
                        <button class="btn btn-outline-danger">Try Now (Not Really)</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        💰 Fake Feature 2: Dynamic Pricing
                    </div>
                    <div class="card-body">
                        <p>Rent automatically increases when the tenant is happiest in their home. Happiness detected via secret cameras.</p>
                        <button class="btn btn-outline-danger">Enable Surveillance</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-warning mt-4">
            <h4>⚠️ Important Notice About Your Rental System</h4>
            <p>This is actually a prank! But here's what the REAL system will include:</p>
            <ul>
                <li>Property listings with photos and details</li>
                <li>Tenant application processing</li>
                <li>Lease management</li>
                <li>Rent collection tracking</li>
                <li>Maintenance request system</li>
            </ul>
            <p class="mb-0">Coming soon... after I stop laughing! 🤣</p>
        </div>

        <div class="text-center mt-4">
            <button id="panicButton" class="btn btn-lg btn-danger">PANIC BUTTON</button>
        </div>
    </div>

    <!-- Laughing emojis that roll across the screen -->
    <div id="emojiContainer"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Create rolling laughing emojis
        const emojis = ['🤣', '😂', '😆', '🎭', '🤡', '👻'];
        for (let i = 0; i < 12; i++) {
            const emoji = document.createElement('div');
            emoji.className = 'laughing-emoji';
            emoji.textContent = emojis[Math.floor(Math.random() * emojis.length)];
            emoji.style.top = Math.random() * 80 + 10 + '%';
            emoji.style.animationDuration = (Math.random() * 5 + 3) + 's';
            emoji.style.animationDelay = Math.random() * 5 + 's';
            document.getElementById('emojiContainer').appendChild(emoji);
        }

        // Panic button effect
        document.getElementById('panicButton').addEventListener('click', function() {
            alert('APRIL FOOL! The system is fine (or is it?) 🤪');
            document.body.style.transform = 'rotate(' + (Math.random() * 10 - 5) + 'deg)';
            setTimeout(() => {
                document.body.style.transform = 'rotate(0deg)';
            }, 500);
        });

        // Random glitch effect
        setInterval(() => {
            if (Math.random() > 0.7) {
                document.querySelector('.glitch').classList.add('glitch');
                setTimeout(() => {
                    document.querySelector('.glitch').classList.remove('glitch');
                }, 200);
            }
        }, 3000);
    </script>
</body>
</html>