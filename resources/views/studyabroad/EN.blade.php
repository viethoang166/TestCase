@extends('layout.master')
@section('main')
    <div class="container">
        <div class="title-wapper">
            <h1 class="entry-title my-3">DU HỌC ANH QUỐC</h1>
        </div>

        @php
            $link = 'https://i.gocollette.com/img/destination-page/europe/england-wales/england-ms1.jpg?h=720&w=1280&la=en-AU';
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
            <h1 class="entry-title my-3">CÁC CHƯƠNG TRÌNH HỌC DÀNH CHO SINH VIÊN QUỐC TẾ</h1>
            <ul style="text-align: justify">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="width: 40%;"><strong>Trường đại học Anh</strong></td>
                            <td style="width: 25%;"><strong>Chính sách học phí</strong></td>
                            <td><strong>Chuyên ngành nổi bật</strong></td>
                        </tr>
                        @if (!empty($country->schools))
                            @foreach ($country->schools as $school)
                                <tr>
                                    <td><span style="font-weight: 400;">{{ $school->name }}</span></td>
                                    <td><span style="font-weight: 400;">£14.000 - £15.500/năm</span></td>
                                    <td><span style="font-weight: 400;">{{ $school->majors->implode('name', ', ') }}</span></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td><span style="font-weight: 400;">Đại học Teesside</span>
                                </td>
                                <td><span style="font-weight: 400;">£11.750 - £13,000/năm</span></td>
                                <td><span style="font-weight: 400;">Khóa học đại học toàn thời gian, Khóa học Diploma sau
                                        đại
                                        học toàn thời gian, Tiến sĩ về Y tế & Chăm sóc Xã hội</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 400;">Đại học Leeds Beckett</span></td>
                                <td><span style="font-weight: 400;">£11,000 - £14.000/năm</span></td>
                                <td><span style="font-weight: 400;">Chương trình Foundation, Công trình nghiên cứu</span>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 400;">Đại học Leeds Trinity</span></td>
                                <td><span style="font-weight: 400;">£11.500 - £12.500/năm</span></td>
                                <td><span style="font-weight: 400;">Khóa học đại học ba năm, Chuyên ngành Báo chí, Chương
                                        trình
                                        Kinh doanh Quốc tế, Chương trình hỗ trợ gia đình Family Support, Chương trình nghiên
                                        cứu
                                    </span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 400;">Đại học Cumbria</span></td>
                                <td><span style="font-weight: 400;">£12.800 - £15.500/năm</span></td>
                                <td><span style="font-weight: 400;">Bằng cử nhân (BA, BSc, LLB), Cử nhân (Hons) ngành Công
                                        tác
                                        xã hội, Các khóa học sau đại học, MBA</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 400;">Đại học Thủ đô London</span></td>
                                <td><span style="font-weight: 400;">£13.200 - £13.750/năm</span></td>
                                <td><span style="font-weight: 400;">MBA, Bằng danh dự toàn thời gian (BA hoặc BSc), Bằng
                                        thạc
                                        sĩ (Phân tích dữ liệu – MSc)</span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 400;">Đại học Bolton</span></td>
                                <td><span style="font-weight: 400;">£3750 - £8500/năm</span></td>
                                <td><span style="font-weight: 400;">Học kỳ Dự bị Quốc tế, Chương trình Dự bị Quốc tế, Chương
                                        trình dự bị thạc sĩ, Chứng chỉ sau đại học (60 tín chỉ) </span></td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 400;">Đại học Buckinghamshire</span></td>
                                <td><span style="font-weight: 400;">£9,400 - £11.800 /năm</span></td>
                                <td><span style="font-weight: 400;">Đại học toàn thời gian (BA / BSc (Hons), LLB (Hons),
                                        BEng,
                                        FDA, FDSC), Các khóa học sau đại học toàn thời gian (MA / MSc, MEng, LLM)Không bao
                                        gồm
                                        MA, MBA quốc tế toàn thời gian 180 tín chỉ, Chương trình Quảng cáo toàn thời
                                        gian</span>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 400;">Đại học Coventry</span></td>
                                <td><span style="font-weight: 400;">£9,400 - £11.800 /năm</span></td>
                                <td><span style="font-weight: 400;">Đại học toàn thời gian (BA / BSc (Hons), LLB (Hons),
                                        BEng,
                                        FDA, FDSC), Các khóa học sau đại học toàn thời gian (MA / MSc, MEng, LLM)Không bao
                                        gồm
                                        MA, MBA quốc tế toàn thời gian 180 tín chỉ, Chương trình Quảng cáo toàn thời
                                        gian</span>
                                </td>
                            </tr>
                            <tr>
                                <td><span style="font-weight: 400;">Đại học York St John </span></td>
                                <td><span style="font-weight: 400;">£9,500 - £17.250 /năm</span></td>
                                <td><span style="font-weight: 400;">Nghiên cứu sau đại học, Chương trình sau đại học Giảng
                                        dạy
                                        MA / MSc, Chuyên ngành sức khỏe UG & PG, Thạc sĩ Quản trị Kinh doanh Quản trị Kinh
                                        doanh, Vật lý trị liệu MSC </span></td>
                            </tr>
                        @endif


                    </tbody>
                </table>
        </div>
        <div class="title-wapper">
            <h1 class="entry-title my-3">CÁC LOẠI HỌC BỔNG ĐƯỢC NHẬN</h1>
        </div>
        <div class="col-md-12 ">
            <p style="text-align: justify">Có khá nhiều học bổng và giải thưởng dành cho sinh viên quốc tế lựa chọn
                <strong>du học tại Anh</strong> được Chính phủ Anh hoặc các tổ chức giáo dục trao dựa trên thành tích học
                tập của sinh viên. Những giải thưởng này được đánh giá cao bởi các nhà tuyển dụng và trong các ngành công
                nghiệp. Đây cũng là một trong những lý do tại sao sinh viên quốc tế lựa chọn đi du học ở Anh.
            </p>
            <p style="text-align: justify">Bạn có thể tham khảo danh sách các học bổng sau:</p>
            <ul style="text-align: justify">
                @if (!empty($scholarships))
                    {{--  --}}
                @else
                    <li>ISIC and British Council</li>
                    <li>Học bổng liên kết của Studyportals</li>
                    <li>Học bổng cho khối thịnh vượng chung -The Commonwealth Scholarships</li>
                    <li>Học bổng Euraxess UK của hội đồng Anh</li>
                    <li>Học bổng Chevening</li>
                @endif
            </ul>
            <p style="text-align: justify">Cùng nhiều học bổng giá trị của của các trường như: University College London,
                London School of Economics and Political Science (LSE), King’s College London, Imperial College London,
                University of Oxford, University of Cambridge…</p>
        </div>
        <div class="title-wapper">
            <h1 class="entry-title my-3">TẠI SAO NÊN CHỌN KINGSTUDY KHI CẦN DU HỌC ANH</h1>
        </div>
        <div class="col-md-12">
            <h3 style="text-align: justify">Bạn sẽ nhận được gì?</h3>
            <ul style="text-align: justify">
                <li>Lựa chọn được ngôi trường phù hợp nhất với trình độ, nguyện vọng, tài chính với bạn</li>
                <li>Săn được học bổng có giá trị thuận lợi, dễ dàng</li>
                <li>Hoàn thành hồ sơ xét duyệt nhanh chóng</li>
                <li>Tỉ lệ xin Visa thành công cao</li>
                <li>Những hồ sơ khó được xem xét, xử lý nhanh chóng</li>
                <li>Được đội ngũ chuyên viên tư vấn đồng hành, hướng dẫn qua các quy trình xin thư nhập học, nộp hồ sơ, xin
                    thị thực</li>
                <li>Mọi thắc mắc về đều được chuyên gia hàng đầu đã từng là du học sinh tại Anh quốc tư vấn, giúp đỡ, giải
                    đáp.</li>
            </ul>
            <h3 style="text-align: justify">Tại sao KINGSTUDY làm được điều đó?</h3>
            <ul style="text-align: justify">
                <li>Với đội ngũ tư vấn viên và quản lý có kinh nghiệm hơn 10 năm hoạt động trong lĩnh vực tư vấn du học</li>
                <li>Đội ngũ chuyên gia hàng đầu đã từng là du học sinh</li>
                <li>Là một trong những Công ty tư vấn Du học uy tín, tận tâm nhất</li>
                <li>Sở hữu những mối liên kết mạnh mẽ với nhiều trường Cao đẳng, Học viện, Đại học trên nhiều quốc gia, mang
                    đến những thông tin chính xác, cập nhật mới nhất về các khóa học, học phí từ các trường đối tác.</li>
            </ul>
            <h3><strong>Chứng chỉ &amp; bằng cấp</strong></h3>
            <p class="image-study"><img aria-describedby="caption-attachment-5674" class="size-large"
                    src="../img/chungchi.png" alt="Assistant-Award-thinkedu" width="724" height="1024" /></p>
        </div>
    </div>
@endsection
