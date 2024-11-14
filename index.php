<?php
// config.php
// $targetDate = "2024-12-25 00:00:00"; // Ganti dengan tanggal ulang tahun yang diinginkan
$targetDate = "2024-11-22 00:00:00"; // Ganti dengan tanggal ulang tahun yang diinginkan
$birthdate = new DateTime($targetDate);
$now = new DateTime();
$interval = $now->diff($birthdate);

// Mengecek apakah sudah lewat tanggal
$isExpired = $now > $birthdate;

// Menghitung total detik untuk javascript countdown
$totalSeconds = $birthdate->getTimestamp() - $now->getTimestamp();

// Array foto-foto untuk galeri (ganti dengan URL foto yang sebenarnya)
$photos = [
    "https://cdn-01.cms-ap-v2i.applyflow.com/pinnacle-people/wp-content/uploads/2023/09/slide-2.png",
    "https://cdn-01.cms-ap-v2i.applyflow.com/pinnacle-people/wp-content/uploads/2023/09/slide-2.png",
    "https://cdn-01.cms-ap-v2i.applyflow.com/pinnacle-people/wp-content/uploads/2023/09/slide-2.png",
    "https://cdn-01.cms-ap-v2i.applyflow.com/pinnacle-people/wp-content/uploads/2023/09/slide-2.png"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        .bg-animated {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .star {
            position: absolute;
            animation: twinkle 1s infinite;
        }
        @keyframes twinkle {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        .bg-animated {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .star {
            position: absolute;
            animation: twinkle 1s infinite;
        }
        @keyframes twinkle {
            0% { opacity: 0; }
            50% { opacity: 1; }
            100% { opacity: 0; }
        }

        .photo-frame {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }

        .photo-frame:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.4);
        }

        .photo-container {
            perspective: 1000px;
        }

        .photo-rotate {
            transform-style: preserve-3d;
            transition: transform 0.5s;
        }

        .photo-rotate:hover {
            transform: rotateY(10deg);
        }

        @keyframes polaroidShake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-3deg); }
            75% { transform: rotate(3deg); }
        }

        .polaroid {
            background: white;
            padding: 15px 15px 40px 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .polaroid:hover {
            animation: polaroidShake 0.5s ease-in-out;
        }

        .memory-wall {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .heart-beat {
            animation: heartBeat 1.5s ease-in-out infinite;
        }

        @keyframes heartBeat {
            0% { transform: scale(1); }
            14% { transform: scale(1.1); }
            28% { transform: scale(1); }
            42% { transform: scale(1.1); }
            70% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-animated min-h-screen flex items-center justify-center overflow-x-hidden relative">
    <div id="particles-js"></div>

    <div class="content-wrapper">
        <!-- Stars Background -->
        <div id="stars" class="absolute inset-0 overflow-hidden"></div>

        <!-- Countdown Section -->
        <div id="countdown" class="<?php echo $isExpired ? 'hidden' : ''; ?> text-center p-8 bg-white bg-opacity-10 backdrop-blur-xl rounded-3xl shadow-2xl w-full max-w-2xl mx-4 border border-white border-opacity-20">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-8 tracking-wider">Special Day Coming!</h1>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white bg-opacity-15 rounded-2xl p-6 backdrop-blur-sm transform hover:scale-105 transition-transform duration-300">
                    <div id="days" class="text-4xl md:text-6xl font-bold text-white mb-2"><?php echo $interval->days; ?></div>
                    <div class="text-sm text-white uppercase tracking-widest">Days</div>
                </div>
                <div class="bg-white bg-opacity-15 rounded-2xl p-6 backdrop-blur-sm transform hover:scale-105 transition-transform duration-300">
                    <div id="hours" class="text-4xl md:text-6xl font-bold text-white mb-2"><?php echo $interval->h; ?></div>
                    <div class="text-sm text-white uppercase tracking-widest">Hours</div>
                </div>
                <div class="bg-white bg-opacity-15 rounded-2xl p-6 backdrop-blur-sm transform hover:scale-105 transition-transform duration-300">
                    <div id="minutes" class="text-4xl md:text-6xl font-bold text-white mb-2"><?php echo $interval->i; ?></div>
                    <div class="text-sm text-white uppercase tracking-widest">Minutes</div>
                </div>
                <div class="bg-white bg-opacity-15 rounded-2xl p-6 backdrop-blur-sm transform hover:scale-105 transition-transform duration-300">
                    <div id="seconds" class="text-4xl md:text-6xl font-bold text-white mb-2"><?php echo $interval->s; ?></div>
                    <div class="text-sm text-white uppercase tracking-widest">Seconds</div>
                </div>
            </div>
        </div>
        <!-- Enhanced Birthday Message with Photos -->
        <div id="birthday-message" class="<?php echo !$isExpired ? 'hidden' : ''; ?> text-center p-8 bg-white bg-opacity-10 backdrop-blur-xl rounded-3xl shadow-2xl w-full max-w-5xl mx-4 border border-white border-opacity-20">
            <!-- Main Greeting Section -->
            <div class="space-y-8 mb-12">
                <div class="slide-up" style="animation-delay: 0.2s">
                    <h1 class="text-6xl md:text-8xl font-bold text-white mb-4 tracking-wider glow">
                        🎉 Selamat Ulang Tahun! 🎉
                    </h1>
                </div>

                <!-- Profile Photo Section -->
                <div class="slide-up flex justify-center" style="animation-delay: 0.4s">
                    <div class="photo-frame polaroid transform hover:scale-105 transition-all duration-300">
                        <img src="https://cdn-01.cms-ap-v2i.applyflow.com/pinnacle-people/wp-content/uploads/2023/09/slide-2.png" alt="Birthday Person" 
                             class="rounded-xl w-64 h-64 object-cover">
                        <p class="text-black mt-4 font-handwriting text-xl">Happy Birthday! 🎂</p>
                    </div>
                </div>

                <!-- Birthday Wish -->
                <div class="slide-up" style="animation-delay: 0.6s">
                    <p class="text-lg md:text-xl text-white">
                        "Setiap detik bersamamu adalah keajaiban, setiap senyumanmu adalah kebahagiaanku.<br>
                        Di hari ulang tahunmu ini, kuharap semua impianmu menjadi nyata, dan semoga cinta kita semakin kuat dari hari ke hari."
                    </p>
                </div>

                <!-- Interactive Elements -->
                <div class="grid grid-cols-3 gap-8 max-w-md mx-auto slide-up" style="animation-delay: 0.8s">
                    <div class="heart-beat">
                        <div class="text-7xl md:text-8xl cursor-pointer transform hover:scale-125 transition-transform">🎂</div>
                    </div>
                    <div class="float-animation">
                        <div class="text-7xl md:text-8xl cursor-pointer transform hover:scale-125 transition-transform">🎈</div>
                    </div>
                    <div class="heart-beat" style="animation-delay: 0.3s">
                        <div class="text-7xl md:text-8xl cursor-pointer transform hover:scale-125 transition-transform">🎁</div>
                    </div>
                </div>
            </div>

            <!-- Memory Wall Section -->
            <div class="slide-up" style="animation-delay: 1s">
                <h2 class="text-4xl font-bold text-white mb-8 glow">✨ Memory Wall ✨</h2>
                <div class="memory-wall">
                    <?php foreach ($photos as $index => $photo): ?>
                    <div class="photo-container">
                        <a href="<?php echo $photo; ?>" data-lightbox="memories" 
                           data-title="Beautiful Memory #<?php echo $index + 1; ?>"
                           class="block photo-rotate">
                            <div class="polaroid transform hover:scale-105 transition-all duration-300">
                                <img src="<?php echo $photo; ?>" 
                                     alt="Memory <?php echo $index + 1; ?>"
                                     class="w-full h-48 object-cover rounded-lg">
                                <p class="text-black mt-2 text-sm">Memory #<?php echo $index + 1; ?></p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Special Message -->
            <div class="mt-12 p-6 bg-white bg-opacity-20 rounded-xl slide-up" style="animation-delay: 1.2s">
                <p class="text-lg md:text-xl text-white">
                    "Setiap kenangan bersamamu adalah hadiah terindah.<br>
                    Semoga tahun ini membawa lebih banyak momen bahagia untuk dikenang!"
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        // Create stars
        function createStars() {
            const starsContainer = document.getElementById('stars');
            for (let i = 0; i < 50; i++) {
                const star = document.createElement('div');
                star.className = 'star text-white';
                star.style.left = `${Math.random() * 100}%`;
                star.style.top = `${Math.random() * 100}%`;
                star.style.animationDelay = `${Math.random() * 2}s`;
                star.innerHTML = '⋆';
                starsContainer.appendChild(star);
            }
        }
        createStars();

        // Countdown Timer
        const countDownDate = <?php echo $birthdate->getTimestamp() * 1000; ?>;
        
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = countDownDate - now;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").classList.add("hidden");
                document.getElementById("birthday-message").classList.remove("hidden");
            } else {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("days").innerHTML = days;
                document.getElementById("hours").innerHTML = hours;
                document.getElementById("minutes").innerHTML = minutes;
                document.getElementById("seconds").innerHTML = seconds;
            }
        }

        // Update countdown every second if not expired
        <?php if (!$isExpired): ?>
        updateCountdown();
        const x = setInterval(updateCountdown, 1000);
        <?php endif; ?>

        // Initialize Lightbox
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel': "Memory %1 of %2"
        });

        // Enhanced confetti with more variety
        function createConfetti() {
            const colors = ['#FF69B4', '#4158D0', '#FF0099', '#00FFFF', '#FFD700', '#FF1493'];
            const symbols = ['🎉', '✨', '🎈', '🎊', '🌟', '💫', '💝', '🎇'];
            
            setInterval(() => {
                const confetti = document.createElement('div');
                confetti.className = 'falling-confetti text-2xl';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
                confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
                confetti.innerHTML = symbols[Math.floor(Math.random() * symbols.length)];
                document.body.appendChild(confetti);

                setTimeout(() => confetti.remove(), 5000);
            }, 300);
        }

        <?php if ($isExpired): ?>
        createConfetti();
        <?php endif; ?>
    </script>
</body>
</html>

