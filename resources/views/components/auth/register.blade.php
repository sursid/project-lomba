<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Nusa Tani</title>
    <link rel="stylesheet" href="/assets/css/toast.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Background pattern untuk desktop */
        @media (min-width: 1024px) {
            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-image: 
                    url("https://bskdn.kemendagri.go.id/website/wp-content/uploads/2016/08/agri-land-wallpapers.jpg");
                background-position: center;
                z-index: -1;
            }
        }

        .container {
            width: 100%;
            max-width: 480px;
            position: relative;
            z-index: 1;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Animasi mengambang untuk dekorasi */
        @keyframes float {
            0% { transform: translateY(0px) rotate(-12deg); }
            50% { transform: translateY(-10px) rotate(-8deg); }
            100% { transform: translateY(0px) rotate(-12deg); }
        }

        @keyframes floatRight {
            0% { transform: translateY(0px) rotate(12deg); }
            50% { transform: translateY(-10px) rotate(8deg); }
            100% { transform: translateY(0px) rotate(12deg); }
        }

        /* Desktop decorations */
        @media (min-width: 1024px) {
            .rice-left, .rice-right {
                position: fixed;
                height: 100%;
                width: 200px;
                pointer-events: none;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 0;
            }

            .rice-left {
                left: 5%;
                top: 0;
            }

            .rice-right {
                right: 5%;
                top: 0;
            }

            .rice-left svg {
                width: 100px;
                height: 100px;
                opacity: 0.3;
                animation: float 6s ease-in-out infinite;
            }

            .rice-right svg {
                width: 100px;
                height: 100px;
                opacity: 0.3;
                animation: floatRight 6s ease-in-out infinite;
            }

            /* Additional decorative elements */
            .rice-small {
                position: absolute;
                width: 40px;
                height: 40px;
                opacity: 0.2;
            }

            .rice-top-left {
                top: 10%;
                left: 15%;
                animation: float 4s ease-in-out infinite;
            }

            .rice-bottom-right {
                bottom: 10%;
                right: 15%;
                animation: floatRight 4s ease-in-out infinite;
            }
        }

        /* Hide rice decorations on mobile */
        @media (max-width: 1023px) {
            .rice-left, .rice-right, .rice-small {
                display: none;
            }
        }

        .header {
            text-align: center;
            margin-bottom: 32px;
            position: relative;
        }

        .logo {
            margin: 0 auto 16px;
            display: block;
            position: relative;
        }

        .logo svg {
            width: 80px;
            height: 80px;
            filter: drop-shadow(0 4px 6px rgba(22, 163, 74, 0.2));
        }

        h2 {
            color: #166534;
            font-size: 24px;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(22, 163, 74, 0.1);
        }

        .subtitle {
            color: #666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        label {
            display: block;
            color: #374151;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            background: rgba(255, 255, 255, 0.9);
        }

        input:focus {
            outline: none;
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
            background: white;
        }

        .btn {
            width: 100%;
            padding: 12px 24px;
            background: #16a34a;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .btn:hover {
            background: #15803d;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
        }

        .btn:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 24px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e5e7eb;
            z-index: 1;
        }

        .divider span {
            background: white;
            padding: 0 16px;
            color: #6b7280;
            font-size: 14px;
            position: relative;
            z-index: 2;
        }

        .btn-google {
            width: 100%;
            padding: 12px 24px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-size: 14px;
            color: #374151;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-google:hover {
            background: #f9fafb;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-google img {
            width: 20px;
            height: 20px;
        }

        /* Card decoration */
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(to right, #16a34a, #22c55e);
        }
    </style>
</head>
<body>
    <div id="toast-container" class="toast-container"></div>
    <div class="rice-left">
        <svg xmlns="http://www.w3.org/2000/svg" width="10em" height="10em" viewBox="0 0 512 512">
            <path fill="#16A34A" d="m18 494l36.35-330.4c6.728 107.62 4.086 231.82 35.556 295.67c11.205-84.926 15.707-168.18 10.562-249.01c15.225 71.69 35.543 141.68 39.468 217.14c7.395-55.935 12.667-111.52 31.798-169.41c-.76 65.19-17.16 124.9 12.677 157.47z"/>
        </svg>
    </div>

    <!-- Small decorative elements -->
    <svg class="rice-small rice-top-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="#16A34A" d="M98.344 16.688C79.692 43.785 68.498 69.01 65.5 89.56l23.938 39.157l28.624-33.47c.868-21.213-5.49-48.677-19.718-78.563z"/>
    </svg>

    <div class="container">
        <div class="card">
            <!-- Card content remains the same -->
            <div class="header">
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#16A34A" width="1em" height="1em" viewBox="0 0 512 512"><path fill="#16A34A" d="M98.344 16.688C79.692 43.785 68.498 69.01 65.5 89.56l23.938 39.157l28.624-33.47c.868-21.213-5.49-48.677-19.718-78.563zM472.5 19.625C444.04 36.055 423.112 54 411.562 71.25l4.75 45.688L456.563 99c9.89-18.777 15.938-46.29 15.938-79.375zm-91.75 27.28c-10.153 21.036-16.8 40.84-20.156 58.314l18.375 57.686l19.78-34.25l-6.5-62.22h.03a277 277 0 0 0-11.53-19.53zM27.25 80.782c-.125 23.364 2.393 44.102 6.875 61.314L75.5 186.25l3.125-39.406L46 93.47l.03-.032a280 280 0 0 0-18.78-12.657zm132.844 10.532c-8.415 3.504-16.29 7.213-23.594 11.094l-39.25 45.97l-3.094 39.374l50.438-39.094c6.712-15.904 12.09-35.263 15.5-57.344m177.22 21.626c-24.024 58.09-16.16 97.86 7.873 108.5l21.157-36.625l-19.594-61.438a274 274 0 0 0-9.438-10.438zm146.03.218c-4.55-.028-8.97.084-13.28.28L414.935 138l-19.78 34.28l62.343-13.655c12.897-11.47 26.09-26.626 38.656-45.094c-4.358-.216-8.64-.348-12.812-.374zm-226.094 8.72c-23.24 23.238-38.832 46.003-45.53 65.655l16.436 42.907l34.22-27.75c4.695-20.704 3.436-48.856-5.126-80.812M16.406 159.06c3.28 62.77 27.482 95.31 53.75 94.594l3.344-42.22l-44.063-47a279 279 0 0 0-13.03-5.374zm143.22 11.375a272 272 0 0 0-18.5 4.563l-48.97 37.938l-3.312 41.75c26.492 7.51 57.16-20.567 70.78-84.25zm16.06 1.563c-4.36 22.935-5.65 43.762-4.374 61.5l32.688 51l10.22-38.188l-22.407-58.437h.03a277 277 0 0 0-16.155-15.875zm267.408 8.938l-60.563 13.218l-20.936 36.25c20.682 18.195 60.438 6.035 100.125-45.625a275 275 0 0 0-18.626-3.843m-138.688 25.53c-8.912 1.92-17.304 4.16-25.187 6.657l-46.97 38.03l-10.22 38.19l56.69-29.283c9.493-14.424 18.323-32.49 25.686-53.593zm155.125 25.063c-25.85 20.324-44.046 41.06-53.03 59.782l11.22 44.532l37.28-23.47c7.126-19.99 9.236-48.088 4.53-80.843zm-123.342 8.595c-34.435 77.573-59.394 159.06-62.97 253.03h18.72c3.558-90.792 27.573-169.428 61.312-245.436l-17.063-7.595zm-185.375 6.906c-8.173 62.347 9.714 98.713 35.687 102.75l10.97-40.874l-34.814-54.25a279 279 0 0 0-11.844-7.625zm221.75 24.532c-7.053 22.243-10.817 42.77-11.657 60.532l26.406 54.594L402 349.967l-15.28-60.687h.06c-4.3-5.848-9.033-11.76-14.217-17.717zm-302.47 1.532c-8.664 74.584-8.13 147.835 12.188 220.062h19.44c-20.877-70.772-21.764-143.02-13.064-217.906l-18.562-2.156zm219.47 11.094c-6.613.16-12.953.54-19.032 1.125L215.5 313.78l-10.844 40.408c24.69 12.23 59.938-9.82 84.906-70zm206.718 36.937c-9.072.844-17.664 2.052-25.78 3.594l-51.156 32.217l-14.688 36.657l59.75-22.313c11.14-13.193 22.055-30.075 31.875-50.155zm-157.31 22c-15.528 60.938-2.096 99.19 23.217 106.28l15.72-39.28l-28.094-58.03c-3.43-3-7.053-5.985-10.844-8.97zM183.25 368.72c-12.674 41.233-22.26 82.547-26.844 124.436h18.813c4.507-39.722 13.69-79.23 25.905-118.97l-17.875-5.467zm270 26.655l-58 21.688l-15.563 38.875c23.056 15.098 60.673-2.606 92.625-59.407a273 273 0 0 0-19.062-1.155zM356.5 469.03c-1.874 7.713-3.185 15.757-3.656 24.126h18.687c.45-6.686 1.55-13.206 3.126-19.687l-18.156-4.44z"/></svg>
                </div>
                <h2>Bergabung dengan Nusa Tani</h2>
                <p class="subtitle">Komunitas petani modern Indonesia</p>
            </div>

            <form id="registerForm" method="POST">
                @csrf
                
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Masukkan nama lengkap">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required placeholder="Masukan username">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required placeholder="Masukkan email">
                </div>

                <div class="form-group">
                    <label>No. Handphone</label>
                    <input type="tel" name="phone" placeholder="Masukkan nomor handphone">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="Buat password">
                </div>

                <button type="button" onclick="submitRegister()" class="btn">Daftar Sekarang</button>

                <div class="divider">
                    <span>Atau daftar dengan</span>
                </div>

                <button type="button" class="btn-google">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google">
                    <span>Lanjutkan dengan Google</span>
                </button>
            </form>
        </div>
    </div>

    <svg class="rice-small rice-bottom-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="#16A34A" d="M98.344 16.688C79.692 43.785 68.498 69.01 65.5 89.56l23.938 39.157l28.624-33.47c.868-21.213-5.49-48.677-19.718-78.563z"/>
    </svg>

    <div class="rice-right">
        <svg xmlns="http://www.w3.org/2000/svg" width="10em" height="10em" viewBox="0 0 512 512">
            <path fill="#16A34A" d="m18 494l36.35-330.4c6.728 107.62 4.086 231.82 35.556 295.67c11.205-84.926 15.707-168.18 10.562-249.01c15.225 71.69 35.543 141.68 39.468 217.14c7.395-55.935 12.667-111.52 31.798-169.41"/>
        </svg>
    </div>
    <script>
        function submitRegister() {
            const form = document.getElementById('registerForm');
            const formData = new FormData(form);
            
            fetch('/register', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status) {
                    showToast('success', data.message);
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 2000);
                } else {
                    if (data.errors) {
                        const firstError = Object.values(data.errors)[0][0];
                        showToast('error', firstError);
                    } else {
                        showToast('error', data.message);
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('error', 'Terjadi kesalahan pada sistem');
            });
        }
    </script>
    <script src="/assets/js/toast.js" async></script>
</body>
</html>