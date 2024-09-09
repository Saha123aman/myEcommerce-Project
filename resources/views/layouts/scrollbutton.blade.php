<html>
    <head>

<style>
    .scroll-to-top-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none; /* Initially hidden */
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000; /* Ensure it's above other content */
            transition: opacity 0.3s ease;
        }

        .scroll-to-top-btn:hover {
            background-color: #0056b3;
        }
        /* @media (min-width: 820px) {
            .scroll-to-top-btn {
                
                bottom: 100px;
            }
        } */
    </style>

</head>
<body>

    <button id="scrollToTopBtn" class="scroll-to-top-btn">
        <i class="fas fa-chevron-up"></i>
    </button>

<script>
    // JavaScript for Scroll to Top Button
    $(document).ready(function () {
        var scrollToTopBtn = $('#scrollToTopBtn');
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                scrollToTopBtn.fadeIn();
            } else {
                scrollToTopBtn.fadeOut();
            }
        });

        scrollToTopBtn.click(function () {
            $('html, body').animate({ scrollTop: 0 }, 500);
            return false;
        });
    });
</script>

</body>
</html>