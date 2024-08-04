document.addEventListener('DOMContentLoaded', function() {
    // Lấy tất cả các liên kết trong menu
    var links = document.querySelectorAll('.header__menu a');

    // Lặp qua tất cả các liên kết và thêm sự kiện click
    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            // Lấy URL từ thuộc tính href của liên kết
            var url = this.getAttribute('href');

            // Gửi yêu cầu AJAX để tải nội dung mới
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    // Áp dụng hiệu ứng fade out trước khi thay đổi nội dung
                    document.getElementById('content').style.opacity = 0;

                    setTimeout(function() {
                        // Thay đổi nội dung
                        document.getElementById('content').innerHTML = data;

                        // Áp dụng hiệu ứng fade in sau khi thay đổi nội dung
                        document.getElementById('content').style.opacity = 1;

                        // Khởi tạo lại các thư viện như MixItUp và Owl Carousel
                        var mixer = mixitup('.featured__filter');
                        $('.featured__carousel').owlCarousel({
                            loop: true,
                            margin: 30,
                            nav: true,
                            dots: false,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                600: {
                                    items: 3
                                },
                                1000: {
                                    items: 4
                                }
                            }
                        });
                    }, 300); // Đợi 300ms trước khi thay đổi nội dung
                });
        });
    });
});