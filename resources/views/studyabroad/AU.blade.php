@extends('layout.master')
@section('main')
    <div class="container">
        <div class="title-wapper">
            <h1 class="entry-title my-3">DU HỌC ÚC</h1>
        </div>

            @php
            $link = 'https://assets.bwbx.io/images/users/iqjWHBFdfxIU/iZDshdZpXIHI/v0/1200x-1.jpg';
            if ($country_image = Storage::get('admin/image/' . $country->image)) {
                $link = 'data:image/jpeg;base64, ' . base64_encode($country_image);
            }
        @endphp
        <div class="container-fluid d-flex justify-content-center">
            <div class="img-inner">
                <img src="{{ $link }}" alt="">
            </div>
        </div>
        <div class="col-md-12 ">
            <div class="wpb_wrapper">
                {!! $country->description !!}
            </div>
        </div>
        <div class="title-wapper">
            <h1 class="entry-title my-3">CÁC CHƯƠNG TRÌNH HỌC DÀNH CHO SINH VIÊN</h1>
            <div class="content">
                <p style="text-align: justify">Úc có tổng cộng 43 trường đại học, trong đó, 40 trường đại học công lập, 2
                    trường đại học quốc tế và 1 trường đại học tư thục. Đất nước này có một số trường đại học danh tiếng và
                    xếp hạng cao nhất trên thế giới. Theo Bảng xếp hạng Đại học Thế giới QS mới nhất, 35 trường đại học của
                    Úc được xếp hạng trong danh sách 500 trường đại học hàng đầu thế giới và 6 trường được xếp hạng trong số
                    100 trường hàng đầu thế giới.</p>
                <h3 style="text-align: justify"><strong> TOP 10 trường Đại học</strong></h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="width: 40%;"><strong>Trường đại học Úc</strong></td>
                            <td style="width: 25%;"><strong>Chính sách học phí</strong></td>
                            <td><strong>Chuyên ngành nổi bật</strong></td>
                        </tr>
                        @if (!empty($country->schools))
                        @foreach ($country->schools as $school)

                            <tr>
                                <td><span style="font-weight: 400;">{{ $school->name }}</span></td>
                                <td><span style="font-weight: 400;">28.500AUD/ năm</span></td>
                                <td><span style="font-weight: 400;">{{ $school->majors->implode('name', ', ') }}</span></td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td><span style="font-weight: 400;">International College of Management, Sydney (ICMS)</span>
                            </td>
                            <td><span style="font-weight: 400;">29.000 AUD/năm</span></td>
                            <td><span style="font-weight: 400;">Quản lý sự kiện và Quản lý khách sạn</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-weight: 400;">Central Queensland University</span></td>
                            <td><span style="font-weight: 400;">29.000 AUD/năm</span></td>
                            <td><span style="font-weight: 400;">Các chương trình thạc sĩ</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-weight: 400;">Trường Western Sydney</span></td>
                            <td><span style="font-weight: 400;">28.000 AUD/năm</span></td>
                            <td><span style="font-weight: 400;">Kinh doanh, máy tính, giáo dục, nhân văn, luật, y
                                    khoa</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-weight: 400;">Trường Canterbury Institute of Management (CIM)</span></td>
                            <td><span style="font-weight: 400;">16.000 AUD/năm</span></td>
                            <td><span style="font-weight: 400;">Kinh doanh &amp; Quản trị, Kế toán, Quản lý Khách sạn, Hệ
                                    thống Thông tin</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-weight: 400;">Cao đẳng Excelsia</span></td>
                            <td><span style="font-weight: 400;">16.000 AUD/năm</span></td>
                            <td><span style="font-weight: 400;">Giáo dục mầm non, tư vấn, kinh doanh, âm nhạc, kịch
                                    nghệ</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-weight: 400;">Đại học Southern Queensland Sydney</span></td>
                            <td><span style="font-weight: 400;">29.000 AUD/năm</span></td>
                            <td><span style="font-weight: 400;">Kinh doanh, Giáo dục, Luật, Y tế, Kỹ thuật và Khoa
                                    học,…</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-weight: 400;">Đại học Deakin</span></td>
                            <td><span style="font-weight: 400;">27.000 AUD/năm</span></td>
                            <td><span style="font-weight: 400;">Kế toán &amp; Tài chính, Luật, Truyền thông, Giáo dục, Thể
                                    thao, Điều dưỡng và Y tế</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-weight: 400;">Trường đại học Divinity</span></td>
                            <td><span style="font-weight: 400;">14.688AUD/ năm</span></td>
                            <td><span style="font-weight: 400;">Ngành Tôn giáo Thần học</span></td>
                        </tr>
                        <tr>
                            <td><span style="font-weight: 400;">Đại học Sunshine Coast USC&nbsp;</span></td>
                            <td><span style="font-weight: 400;">AUD26,600/ năm</span></td>
                            <td><span style="font-weight: 400;">Kinh doanh, CNTT và du lịch, giáo dục truyền thông,
                                    v.v.</span></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <h3 style="text-align: justify"><strong> Các khóa học hàng đầu để học</strong></h3>
                <p style="text-align: justify">Các trường Đại học Úc cung cấp một loạt các khóa học và chương trình theo
                    lĩnh vực mà sinh viên quan tâm. Cho dù đó là chương trình đại học hay sau đại học mà sinh viên muốn đăng
                    ký, luôn có rất nhiều lựa chọn. Úc đặc biệt nổi tiếng với các Bằng cấp Khoa học Xã hội, Quản lý, Khoa
                    học Tự nhiên, Toán học, Khoa học Đời sống &amp; Nông nghiệp, Y học &amp; Dược lâm sàng, Vật lý.</p>
                <p style="text-align: justify">Các khóa học cấp bằng khác nhau để du học ở các trường đại học Úc:</p>
                <ul style="text-align: justify">
                    <li><strong>Nghệ thuật và thiết kế:</strong> Văn học, Lịch sử, Tâm lý học, Nghiên cứu ngoại ngữ, Truyền
                        thông, Triết học, Quan hệ công chúng</li>
                    <li><strong>Giáo dục:</strong> Nghiên cứu Giáo dục, Giáo dục Đặc biệt, Giảng dạy</li>
                    <li><strong>Kỹ thuật và Công nghệ:</strong> Hóa chất, Ô tô, Dân dụng, Viễn thông, Cơ khí, Hàng không,
                        Khai thác mỏ, Môi trường, Điện, Điện tử, Kết cấu, Công nghiệp, Kỹ thuật tổng hợp, Máy tính, Cơ điện
                        tử</li>
                    <li><strong>Khách sạn và Du lịch:</strong> Quản lý Khách sạn, Nấu ăn Thương mại, Quản lý Du lịch</li>
                    <li><strong>Toán học và Máy tính:</strong> Khoa học Máy tính, Toán học và Thống kê, Hệ thống Thông tin
                        Dựa trên Máy tính</li>
                    <li><strong>Khoa học sức khỏe:</strong> Điều dưỡng, Vật lý trị liệu, Dinh dưỡng, Khoa học Thú y, Sức
                        khỏe Môi trường, Sức khỏe Cộng đồng, Chăm sóc Sức khỏe Cá nhân và Gia đình, Dược phẩm,</li>
                    <li><strong>Khoa học:</strong> Dược học, Khoa học Môi trường, Hóa học</li>
                    <li><strong>Nghệ thuật thị giác và biểu diễn:</strong> Nghệ thuật, Thiết kế thời trang, Âm nhạc, Thủ
                        công mỹ nghệ, Nghệ thuật biểu diễn, Nghệ thuật đồ họa</li>
                    <li><strong>Nông nghiệp:</strong> Khoa học Nông nghiệp, Lâm nghiệp, Trồng trọt, Công nghệ sinh học</li>
                    <li><strong>Luật và Quản trị kinh doanh:</strong> Kinh tế, Nhân sự, Kế toán, Thương mại, Tiếp thị, Quản
                        lý, Hành chính</li>
                </ul>
            </div>
        </div>
        <div class="title-wapper">
            <h1 class="entry-title my-3">DU HỌC ÚC QUA TRUNG TÂM TƯ VẤN DU HỌC, NÊN HAY KHÔNG?</h1>
            <div class="content">
                <p style="text-align: justify">Có nên đi du học Úc qua trung tâm tư vấn du học không? Câu trả là là có. Bởi
                    lẽ, bạn sẽ nhận được vô số những lợi ích khi đăng ký du học Úc thông qua trung tâm tư vấn du học, như:
                </p>
                <h3 style="text-align: justify"> Lộ trình học tập rõ ràng, phù hợp</h3>
                <p style="text-align: justify">Với kinh nghiệm nhiều năm trong lĩnh vực du học Úc, các trung tâm tư vấn du
                    học Úc sẽ trao đổi, tư vấn với phụ huynh và học sinh để có thể tìm được ngôi trường, ngành học, phù hợp
                    với bản thân học sinh, đồng thời lên kế hoạch học tập rõ ràng, phù hợp.</p>
                <h3 style="text-align: justify"> Tiết kiệm thời gian chuẩn bị hồ sơ</h3>
                <p style="text-align: justify">Lựa chọn đặt niềm tin vào các trung tâm tư vấn du học ÚC đồng nghĩa với việc
                    thay vì phải tự mình chuẩn bị hàng tá giấy tờ cần thiết cho hồ sơ du học, hay tự mình tìm kiếm thông tin
                    qua nhiều nguồn khác nhau, đôi khi mất nhiều thời gian nhưng vẫn không đầy đủ và hiệu quả thì công việc
                    phức tạp đó đã có trung tâm lo. Nhờ vậy, phụ huynh và học sinh tiết kiệm được nhiều thời gian và công
                    sức để chuẩn bị cho những việc khác.</p>
                <h3 style="text-align: justify"> Thông tin đầy đủ, chính xác và cập nhật liên tục</h3>
                <p style="text-align: justify">Các trung tâm tư vấn du học luôn nhanh nhạy trong vấn đề liên quan đến du
                    học tại Úc như: điều kiện nộp đơn nhập học, học bổng tại các trường, các thông tin mới về chính sách
                    visa, chuẩn bị hồ sơ, cơ hội việc làm, cơ hội định cư… Vì vậy, họ sẽ cung cấp cho phụ huynh và học sinh
                    nhưng thông tin chi tiết, những phân tích thấu đáo, những tư vấn hiệu quả về việc lựa chọn trường học
                    nào dựa trên khả năng học tập của từng học sinh cũng như điều kiện kinh tế của từng gia đình.</p>
                <p style="text-align: justify">Không chỉ vậy, các trung tâm du học Úc thường là đại diện tuyển sinh chính
                    thức của các trường học tại Úc. Cho nên, phụ huynh và học sinh sẽ có cơ hội trực tiếp tham gia các buổi
                    hội thảo, nơi đại diện tuyển sinh của các trường cung cấp thông tin về các chương trình học và giải đáp
                    các câu hỏi xung quanh việc học tập tại trường. Qua các buổi tư vấn trực tiếp, phụ huynh và học sinh sẽ
                    được cung cấp và cập nhật các thông tin du học mới nhất.</p>
                <p style="text-align: justify">Chưa hết, trong suốt quá trình học tập của học sinh, sinh viên tại Úc, các
                    trung tâm luôn duy trì các chính sách ưu đãi và hỗ trợ tư vấn cho phụ huynh cũng như học sinh, sinh
                    viên. Trong trường hợp phụ huynh muốn sang thăm con em mình, trung tâm sẽ hỗ trợ đắc lực trong việc xin
                    visa, thu xếp chỗ ở, đi lại, giúp các gia đình tiết kiệm được công sức, thời gian và tiền bạc.</p>
                <p style="text-align: justify"></p> Chúng tôi không chỉ cung cấp mọi thông tin hữu ích cũng như tư vấn cho
                sinh viên có nhu cầu du học mà còn đóng vai trò là cầu nối giữa sinh viên với các trường học ở Úc, Canada,
                Anh, Úc, Hoa Kỳ và nhiều quốc gia khác. Cho đến nay, Chúng tôi đã giúp hàng triệu sinh viên tìm được khóa
                học phù hợp để tạo nên nền tảng vững chắc chắp cánh những mơ ước bay cao, bay xa.</p>
                <p style="text-align: left">KINGSTUDY cam kết hỗ trợ bạn thực hiện ước mơ du học của mình và chúng tôi chắc
                    chắn có thể liên hệ với bạn bằng kỹ thuật số nếu bạn không thể gặp trực tiếp chúng tôi. Vui lòng liên hệ
                    với Chúng tôi theo:</p>
                <p style="text-align: justify">KINGSTUDY &#8211; Chắp cánh ước mơ du học của bạn thành hiện thực, mở ra một
                    tương lai tươi sáng!</p>
            </div>
        </div>
    </div>
@endsection
