@extends('layout.master')
@section('main')
    <div class="container">
        <div class="title-wapper">
            <h1 class="entry-title my-3">DU HỌC MỸ</h1>
        </div>
        <div class="container-fluid">
            @php
                $link = 'https://i0.wp.com/www.wanderlustdaily.com/wp-content/uploads/2017/12/viaggio-in-america-2.jpg?fit=1170%2C500&ssl=1';
                if ($country_image = Storage::get('admin/image/' . $country->image)) {
                    $link = 'data:image/jpeg;base64, ' . base64_encode($country_image);
                }
            @endphp
            <div class="container-fluid d-flex justify-content-center">
                <div class="img-inner">
                    <img src="{{ $link }}" alt="">
                </div>
            </div>
            {!! $country->description !!}
        </div>

        <div class="title-wapper">
            <h1 class="entry-title my-3">  CÁC HỌC BỔNG DU HỌC MỸ</h1>
        </div>
        <div class="col-md-12">
            <div class="content">
                <p>Chính phủ Mỹ và các trường đại học ít khi tài trợ học bổng toàn phần cho bậc cử nhân. Các học bổng toàn
                    phần chủ yếu tập trung vào chương trình nghiên cứu sinh, thạc sĩ, tiến sĩ.</p>
                @php
                    $scholarships = collect([]);
                    if (!empty($country->schools)) {
                        foreach ($country->schools as $school) {
                            if (!empty($school->scholarships)) {
                                $scholarships = $scholarships->merge($school->scholarships);
                            }
                        }
                    }
                @endphp
                @if (!empty($scholarshios))
                    {{--  --}}
                @else
                    <h3 style="font-weight: 500;">Học bổng cử nhân</h3>
                    <ul>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>
                                    <h4>Học bổng 65% học phí tại Đại học Pace</h4>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p>Đại học Pace tài trợ học bổng cho các sinh viên có thành tích học tập xuất sắc. Nhà trường xét học
                        bổng
                        theo điểm GPA và chứng chỉ ngoại ngữ, bỏ qua hình thức SAT/ACT. Thậm chí sinh viên còn không phải
                        nộp
                        đơn xin học bổng. Đại học Pace tự xét ngay khi sinh viên nhập học. Giá trị cao nhất của học bổng là
                        65%.
                        Thời hạn học bổng kéo dài 4 năm, được tự động gia hạn nếu sinh viên giữ vững kết quả học tập. Nhưng
                        chỉ
                        áp dụng cho sinh viên nhập học kỳ mùa thu và mùa xuân.</p>
                    <ul>
                        <li style="list-style-type: none;">
                            <ul>
                                <li style="padding-top: 10px;">
                                    <h4>Học bổng 100% học phí từ Đại học Saint Louis</h4>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p>Đại học Saint Louis trao học bổng 100% cho học sinh có thành tích học tập xuất sắc và nhập học trước
                        01/12. Nhà trường tự xét học bổng cho sinh viên chứ không cần sinh viên phải nộp đơn từ. Nhà trường
                        trao
                        học bổng dựa theo năng lực của sinh viên. Tức là bạn càng giỏi, hồ sơ càng đẹp thì sẽ nhận được học
                        bổng
                        càng cao. Giá trị cao nhất của học bổng là 100% học phí và thấp nhất là 1000 USD/ năm. Học bổng có
                        thời
                        hạn 4 năm và tự động gia hạn nếu sinh viên tiếp tục giữ vững phong độ học tập, rèn luyện.</p>
                    <ul>
                        <li style="list-style-type: none;">
                            <ul>
                                <li style="padding-top: 10px;">
                                    <h4>Học bổng 12.000 USD từ đại học Cincinnati</h4>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p>Mỗi năm đại học Cincinnati tài trợ rất nhiều học bổng cho sinh viên quốc tế học bậc cử nhân. Giá trị
                        học
                        bổng từ 1.000 &#8211; 12.000 USD/ năm. Học bổng cũng tự gia hạn hằng năm nếu sinh viên giữ vững
                        thành
                        tích học tập. Cũng giống như đại học Pace và đại họcSaint Louis, học bổng cũng được xét tự động nếu
                        sinh
                        viên đủ điều kiện.</p>
                    <p>Tất cả các trường ESA liệt kê trên có tài trợ học bổng cho bậc thạc sĩ, tiến sĩ. Giá trị học từ từ 30
                        &#8211; 100% tuỳ vào bề dày thành tích của ứng viên.</p>
                    <p>Không phải chỉ có những trường đại học ESA kể trên tài trợ học bổng mà tất cả các trường đại học ở Mỹ
                        đều
                        có chính sách học bổng. Để nhận được các thông tin học bổng mới nhất, bạn vui lòng nhấn nút vào nút
                        đăng
                        ký ở bên dưới.</p>
                    <h3 style="font-weight: 500;">Học bổng thạc sĩ</h3>
                    <ul>
                        <li style="list-style-type: none;">
                            <ul>
                                <li>
                                    <h4>Học bổng toàn phần Hubert H. Humphrey</h4>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p>Đây là một học bổng đặc biệt. Chỉ dành cho những cán bộ, nhân viên có triển vọng và đang làm các công
                        việc phục vụ lợi ích cộng đồng. Bạn sẽ được học 1 năm ở các trường đại học danh tiếng nhất của Mỹ.
                        Được
                        thực tập, thực tế, nghiên cứu, dự hội thảo, hội nghị liên quan đến ngành học. Nhưng không được cấp
                        bằng.
                        Các ngành được nhận học bổng Hubert H. Humphrey gồm: phát triển Nông Nghiệp và Nông thôn, quy hoạch
                        Đô
                        thị và Vùng, quản lý tài nguyên, kinh tế phát triển, chính sách môi trường, tài chính &#8211; ngân
                        hàng
                        và biến đổi khí hậu. Học bổng sẽ tài trợ: vé máy bay khứ hồi, học phí, sinh hoạt phí, các loại bảo
                        hiểm,
                        chi phí mua học liệu và các hoạt động chuyên môn.</p>
                    <ul>
                        <li style="list-style-type: none;">
                            <ul>
                                <li style="padding-top: 10px;">
                                    <h4>Học bổng toàn phần Fulbright</h4>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p>Học bổng Fulbright đài thọ toàn bộ chi phí du học Mỹ của bạn. Bao gồm vé máy bay khứ hồi, lệ phí, học
                        phí, sinh hoạt phí, các loại bảo hiểm, hỗ trợ chi phí trong quá trình làm hồ sơ, nộp đơn. Điều kiện
                        xét
                        học bổng này như sau:</p>
                    <p>&#8211; Là công dân Việt Nam (không có hai quốc tịch).<br />
                        &#8211; Có ít nhất một bằng đại học.<br />
                        &#8211; Có ít nhất hai năm kinh nghiệm làm việc sau khi tốt nghiệp cử nhân (tính đến thời điểm nộp
                        đơn).<br />
                        &#8211; Có chứng chỉ TOEFL iBT 79 hoặc IELTS 6.5.<br />
                        &#8211; Chưa nhận học bổng tài trợ của Chương trình Sinh viên Fulbright.<br />
                        &#8211; Chưa nhận bất kỳ học bổng nào cho chương trình nghiên cứu sau đại học ở nước ngoài trong
                        vòng
                        năm năm qua.</p>
                    <ul>
                        <li style="list-style-type: none;">
                            <ul>
                                <li style="padding-top: 10px;">
                                    <h4>Học bổng toàn phần Fincad’s Women in Finance International Scholarship</h4>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <p>Đây là một học bổng rất đặc biệt, rất nhân văn. Tại sao ESA nói như vậy? Bởi học bổng này chỉ dành
                        cho
                        phụ nữ. Nó ra đời vì mục đích hỗ trợ những người phụ nữ xuất sắc có cơ hội bước đến một tương lai
                        tươi
                        sáng hơn. Học viên có thể chọn bất cứ chuyên ngành nào, bất cứ trường học nào ở New York. Ngoài điều
                        kiện về thành tích học tập giỏi trở lên, có chứng chỉ TOEFL iBT 79 hoặc IELTS 6.5. Bạn phải đăng ký
                        học
                        toàn thời gian tại trường đại học.</p>
                @endif
            </div>
        </div>
        <div class="title-wapper">
            <h1 class="entry-title my-3">  CHI PHÍ DU HỌC MỸ</h1>
        </div>
        <div class="col-md-12">
            <div class="content">
                <p>Mỹ là quốc gia vừa có chi phí học tập, vừa có chi phí sinh hoạt khá cao. Để được học tập, sinh sống tại
                    đây bạn phải chuẩn bị bao nhiêu?</p>
                <h3 style="font-weight:500; padding-top: 10px;"><span>Học phí</span></h3>
                <p>Học phí bị chi phối bởi nhiều yếu tố. Ví dụ địa điểm của trường học, loại hình trường học, bậc học, ngành
                    học, thời gian học. Nhìn chung, trường tư đắt hơn trường công. Trường nổi tiếng, đứng top sẽ đắt hơn
                    trường bình thường. Bậc học càng cao học phí càng đắt. Tuy nhiên thời gian học bậc cử nhân dài hơn (4
                    năm) nên tổng học phí nhiều hơn thạc sĩ và tiến sĩ.</p>
                <table class="table table-bordered" style="height: 147px;border:5px">
                    <tbody>
                        <tr>
                            <td style="text-align:center; width:10%"><strong>Thứ hạng</strong></td>
                            <td style="text-align:center; width:40%"><strong>Trường</strong></td>
                            <td style="text-align:center; width:25%"><strong>Học phí</strong> <br>
                                (<em>Đơn vị USD</em>)</td>
                            <td style="text-align:center; width:25%"><strong>Ngành học</strong></td>
                        </tr>
                        @if (!empty($country->schools))
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($country->schools as $school)
                                <tr>
                                    <td style="text-align:center">{{ $stt++ }}</td>
                                    <td>{{ $school->name }}</td>
                                    <td style="text-align:center">56.010</td>
                                    <td style="text-align:center">{{ $school->majors->implode('name', ', ') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td style="text-align:center">2</td>
                                <td>Đại học Columbia</td>
                                <td style="text-align:center">63.530</td>
                                <td style="text-align:center">6.170</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">=2</td>
                                <td>Đại học Harvard</td>
                                <td style="text-align:center">55.587</td>
                                <td style="text-align:center">5.222</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">=2</td>
                                <td>Viện Công nghệ Massachusetts (MIT)</td>
                                <td style="text-align:center">55.878</td>
                                <td style="text-align:center">4.361</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">5</td>
                                <td>Đại học Yale</td>
                                <td style="text-align:center">59.950</td>
                                <td style="text-align:center">4.703</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">6</td>
                                <td>Đại học Stanford</td>
                                <td style="text-align:center">56.169</td>
                                <td style="text-align:center">6.366</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">=6</td>
                                <td>Đại học Chicago</td>
                                <td style="text-align:center">60.963</td>
                                <td style="text-align:center">6.989</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">8</td>
                                <td>Đại học Pennsylvania</td>
                                <td style="text-align:center">61.710</td>
                                <td style="text-align:center">9.872</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">9</td>
                                <td>Viện Công nghệ California (Caltech)</td>
                                <td style="text-align:center">58.680</td>
                                <td style="text-align:center">901</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">=9</td>
                                <td>Đại học Duke</td>
                                <td style="text-align:center">60.489</td>
                                <td style="text-align:center">6.717</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">=9</td>
                                <td>Đại học John Hopkins</td>
                                <td style="text-align:center">58.720</td>
                                <td style="text-align:center">6.331</td>
                            </tr>
                            <tr>
                                <td style="text-align:center">=9</td>
                                <td>Đại học Northwestern</td>
                                <td style="text-align:center">60.984</td>
                                <td style="text-align:center">8.194</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <p>Ngoài học phí, du học sinh Mỹ còn phải chi ra 1 khoản kha khá để mua học liệu, dụng cụ học tập. Mỗi năm
                    sẽ mất khoảng 900 &#8211; 1.200 USD. Bạn sẽ tiếp tục tốn thêm một khoản tiền nữa nếu chương trình học
                    yêu cầu thực tập. Tức là bạn phải đóng tiền để đi thực tập, thực tế.</p>
                <h3 style="font-weight:500;"><span>Chi phí nhà ở</span></h3>
                <ul>
                    <li>Ký túc xá: Ký túc xá của các trường ở Mỹ sẽ phục vụ sinh viên mọi tiện ích. Từ chỗ ở, điện nước,
                        internet, hệ thống sưởi đến ăn uống. Tiền ký túc xá ở mỗi trường mỗi khác nha các bạn. Ví dụ ở
                        Cornell University 9.180 USD/ năm/ phòng đơn. Nhưng ở Pennsylvania State University chỉ có 5.190/
                        năm/ phòng đôi. Túm lại trung bình mỗi du học sinh Mỹ phải trả 8.400 &#8211; 12.200 USD/ năm.</li>
                    <li>Ở trọ: Ở Mỹ, ở trọ không rẻ hơn ký túc xá như các nước Úc, Canada. Nếu thuê ở ngoài, tiền thuê sẽ
                        khoảng 600 USD/ tháng. Ở trung tâm thành phố lớn tiền thuê nhà đắt gấp 5 lần, khoảng 3.000 USD/
                        tháng. Ví dụ ở New York một căn hộ studio có giá 1.800 USD/ tháng. Ở trung tâm thành phố Colorado,
                        bạn sẽ tốn 1.040 USD/ phòng.</li>
                </ul>
                <h3 style="font-weight:500;"><span>Ăn uống</span></h3>
                <p>Ở mỗi trường đều có canteen. Bạn có thể lựa chọn ăn ở canteen cho thuận tiện đi lại. Còn nếu muốn khám
                    phá thì bạn nên ăn ở nhà hàng. Chi phí ăn ở canteen và ở nhà hàng sêm sêm nhau. Trung bình 7 USD/ pizza,
                    4,5 USD/ ly cà phê. Mỗi suất ăn khoảng 12 &#8211; 15 USD.</p>
                <p>Nếu muốn giảm tiền ăn uống xuống, hãy xem xét đến việc tự đi chợ, nấu ăn nha. Cuối tuần bạn có thể ghé
                    các chợ ở ngoại ô để mua sắm thực phẩm giá rẻ hơn. Hoặc ghé các khu chợ của người Việt nếu nhớ nhung món
                    ăn Việt.</p>
                <h3 style="font-weight:500;"><span>Sinh hoạt phí khác</span></h3>
                <ul>
                    <li>Tiền điện thoại di động khoảng 600 USD/ năm.</li>
                    <li>Các loại đồng phục (thường và thể dục) khoảng 500 USD/ năm.</li>
                    <li>Bảo hiểm y tế từ 350 &#8211; 500 USD/ năm.</li>
                    <li>Tiền vật dụng cá nhân (sữa tắm, bột giặt, thuốc men, quần áo,&#8230;) và dịch vụ vui chơi, giải trí
                        khoảng 2.500 USD/ năm.</li>
                </ul>
                <p>Tàu điện ngầm, xe ở New York. Giá ghi trong bảng là giá đã ưu đãi cho sinh viên.</p>
                <table class="table table-bordered" style="border:3px">
                    <tbody>
                        <tr>
                            <th>Phương tiện đi lại</th>
                            <th>Loại vé</th>
                            <th>Giá tiền</th>
                        </tr>
                        <tr>
                            <td rowspan="2">Tàu điện ngầm, xe buýt ở New York. Giá ghi trong bảng là giá đã ưu đãi cho
                                sinh viên.</td>
                            <td>Vé lượt</td>
                            <td>2.5 USD</td>
                        </tr>
                        <tr>
                            <td>Vé tháng</td>
                            <td>56 &#8211; 62.75 USD</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="title-wapper">
            <h1 class="entry-title my-3">  CÓ NÊN CHỌN TRUNG TÂM TƯ VẤN DU HỌC MỸ KHÔNG?</h1>
        </div>
        <div class="col-md-12">
            <p class="image-study"><img class="aligncenter size-large image" src="../img/kingstudy.png" alt=""
                    width="1024" height="346" /></p>
            <p style="text-align: justify">Các <em><strong>trung tâm tư vấn du học Mỹ</strong></em> luôn nhanh nhạy trong
                vấn đề liên quan đến du học tại Mỹ như: điều kiện nộp đơn nhập học, học bổng tại các trường, các thông tin
                mới về chính sách visa, chuẩn bị hồ sơ, cơ hội việc làm, cơ hội định cư… Vì vậy, họ sẽ cung cấp cho phụ
                huynh và học sinh nhưng thông tin chi tiết, những phân tích thấu đáo, những tư vấn hiệu quả về việc lựa chọn
                trường học nào dựa trên khả năng học tập của từng học sinh cũng như điều kiện kinh tế của từng gia đình.</p>
            <p style="text-align: justify">Không chỉ vậy, các trung tâm du học Mỹ thường là đại diện tuyển sinh chính thức
                của các trường học tại Mỹ. Cho nên, phụ huynh và học sinh sẽ có cơ hội trực tiếp tham gia các buổi hội thảo,
                nơi đại diện tuyển sinh của các trường cung cấp thông tin về các chương trình học và giải đáp các câu hỏi
                xung quanh việc học tập tại trường. Qua các buổi tư vấn trực tiếp, phụ huynh và học sinh sẽ được cung cấp và
                cập nhật các thông tin du học mới nhất.</p>
            <p style="text-align: justify">Chưa hết, trong suốt quá trình học tập của học sinh, sinh viên tại Mỹ, các trung
                tâm luôn duy trì các chính sách ưu đãi và hỗ trợ tư vấn cho phụ huynh cũng như học sinh, sinh viên. Trong
                trường hợp phụ huynh muốn sang thăm con em mình, trung tâm sẽ hỗ trợ đắc lực trong việc xin visa, thu xếp
                chỗ ở, đi lại, giúp các gia đình tiết kiệm được công sức, thời gian và tiền bạc.</p>
            <p style="text-align: justify">Chúng tôi có một đội ngũ các chuyên gia có trình độ chuyên môn cao, các Cố vấn
                chuyên nghiệp và các tư vấn viên được đào tạo có thể hướng dẫn sinh viên chọn trường Đại học, khóa học
                chuyên ngành và hướng dẫn chỗ ở phù hợp với sinh viên.</p>
            <p style="text-align: justify">Chúng tôi không chỉ là cầu nối giữa sinh viên và các trường Đại học, mà Chúng
                tôi còn được công nhận để định hình sự nghiệp của những người khao khát. Đặt niềm tin vào Chúng tôi, bạn sẽ
                nhận chất lượng dịch vụ hàng đầu, quy trình nhập học nhanh nhất cho học viên và những hỗ trợ tốt nhất trong
                suốt quá trình du học Mỹ của học sinh.</p>
            <p style="text-align: justify">KINGSTUDY &#8211; Chắp cánh ước mơ du học của bạn thành hiện thực, mở ra một
                tương lai tươi sáng!</p>
        </div>
    </div>
@endsection
