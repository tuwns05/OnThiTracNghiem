
### **1. `Users` — Quản lý người dùng (Học sinh & Giáo viên)**

| Tên trường      | Kiểu dữ liệu              | Mô tả                 |
| --------------- | ------------------------- | --------------------- |
| `user_id`       | INT, PK, AUTO             | ID người dùng         |
| `email`         | VARCHAR(100)              | Email đăng ký         |
| `password_hash` | VARCHAR(255)              | Mật khẩu đã băm       |
| `full_name`     | VARCHAR(100)              | Họ tên người dùng     |
| `avatar_url`    | VARCHAR(255)              | Ảnh đại diện (nếu có) |
| `role`          | ENUM('student','teacher') | Phân quyền            |
| `created_at`    | DATETIME                  | Ngày tạo tài khoản    |
| `updated_at`    | DATETIME                  | Ngày cập nhật         |

---

### **2. `Classes` — Lớp học do giáo viên tạo**

| Tên trường    | Kiểu dữ liệu  | Mô tả                   |
| ------------- | ------------- | ----------------------- |
| `class_id`    | INT, PK, AUTO | ID lớp học              |
| `teacher_id`  | INT, FK       | Giáo viên phụ trách lớp |
| `class_code`  | VARCHAR(20)   | Mã lớp duy nhất         |
| `class_name`  | VARCHAR(100)  | Tên lớp                 |
| `description` | TEXT          | Mô tả lớp học           |
| `created_at`  | DATETIME      | Ngày tạo lớp            |

---

### **3. `Enrollments` — Học sinh tham gia lớp**

| Tên trường      | Kiểu dữ liệu  | Mô tả          |
| --------------- | ------------- | -------------- |
| `enrollment_id` | INT, PK, AUTO | ID đăng ký lớp |
| `class_id`      | INT, FK       | Lớp học        |
| `student_id`    | INT, FK       | Học sinh       |
| `joined_at`     | DATETIME      | Ngày tham gia  |

---

### **4. `Documents` — Tài liệu học tập**

| Tên trường    | Kiểu dữ liệu  | Mô tả                  |
| ------------- | ------------- | ---------------------- |
| `document_id` | INT, PK, AUTO | ID tài liệu            |
| `uploader_id` | INT, FK       | Người tải lên          |
| `class_id`    | INT, FK NULL  | Thuộc lớp nào (nếu có) |
| `title`       | VARCHAR(150)  | Tên tài liệu           |
| `file_url`    | VARCHAR(255)  | Link tài liệu          |
| `upload_at`   | DATETIME      | Ngày tải lên           |

---

### **5. `Notifications` — Thông báo**

| Tên trường        | Kiểu dữ liệu  | Mô tả                           |
| ----------------- | ------------- | ------------------------------- |
| `notification_id` | INT, PK, AUTO | ID thông báo                    |
| `sender_id`       | INT, FK       | Người gửi                       |
| `receiver_id`     | INT, FK NULL  | Người nhận (nếu là cá nhân)     |
| `class_id`        | INT, FK NULL  | Lớp nhận (nếu là thông báo lớp) |
| `message`         | TEXT          | Nội dung thông báo              |
| `sent_at`         | DATETIME      | Thời điểm gửi                   |

---

### **6. `Questions` — Ngân hàng câu hỏi**

| Tên trường      | Kiểu dữ liệu  | Mô tả                          |
| --------------- | ------------- | ------------------------------ |
| `question_id`   | INT, PK, AUTO | ID câu hỏi                     |
| `author_id`     | INT, FK       | Người tạo câu hỏi              |
| `content`       | TEXT          | Nội dung câu hỏi               |
| `question_type` | VARCHAR(20)   | Loại câu hỏi (MCQ, True/False) |
| `media_url`     | VARCHAR(255)  | Link ảnh/audio công thức       |
| `created_at`    | DATETIME      | Ngày tạo                       |

---

### **7. `Options` — Đáp án cho câu hỏi**

| Tên trường    | Kiểu dữ liệu  | Mô tả                     |
| ------------- | ------------- | ------------------------- |
| `option_id`   | INT, PK, AUTO | ID đáp án                 |
| `question_id` | INT, FK       | Câu hỏi tương ứng         |
| `option_text` | VARCHAR(255)  | Nội dung đáp án           |
| `is_correct`  | BOOLEAN       | Có phải đáp án đúng không |

---

### **8. `Exams` — Đề thi**

| Tên trường        | Kiểu dữ liệu  | Mô tả                     |
| ----------------- | ------------- | ------------------------- |
| `exam_id`         | INT, PK, AUTO | ID đề thi                 |
| `creator_id`      | INT, FK       | Giáo viên tạo đề          |
| `class_id`        | INT, FK       | Áp dụng cho lớp nào       |
| `title`           | VARCHAR(100)  | Tên đề thi                |
| `time_limit`      | INT           | Giới hạn thời gian (phút) |
| `total_questions` | INT           | Tổng số câu hỏi           |
| `weight`          | INT           | Trọng số điểm             |
| `scheduled_at`    | DATETIME      | Ngày giờ thi              |

---

### **9. `ExamQuestions` — Câu hỏi trong đề thi**

| Tên trường         | Kiểu dữ liệu  | Mô tả            |
| ------------------ | ------------- | ---------------- |
| `exam_question_id` | INT, PK, AUTO | ID dòng          |
| `exam_id`          | INT, FK       | Thuộc đề thi nào |
| `question_id`      | INT, FK       | Câu hỏi nào      |

---

### **10. `StudentExams` — Kết quả bài thi của học sinh**

| Tên trường        | Kiểu dữ liệu  | Mô tả                |
| ----------------- | ------------- | -------------------- |
| `student_exam_id` | INT, PK, AUTO | ID lần làm bài       |
| `exam_id`         | INT, FK       | Thuộc đề thi nào     |
| `student_id`      | INT, FK       | Học sinh nào làm bài |
| `start_time`      | DATETIME      | Bắt đầu thi          |
| `end_time`        | DATETIME      | Kết thúc thi         |
| `score`           | FLOAT         | Điểm đạt được        |

---

### **11. `StudentAnswers` — Câu trả lời của học sinh**

| Tên trường           | Kiểu dữ liệu  | Mô tả                |
| -------------------- | ------------- | -------------------- |
| `answer_id`          | INT, PK, AUTO | ID dòng trả lời      |
| `student_exam_id`    | INT, FK       | Bài thi của học sinh |
| `question_id`        | INT, FK       | Câu hỏi tương ứng    |
| `selected_option_id` | INT, FK       | Đáp án học sinh chọn |
| `is_correct`         | BOOLEAN       | Có đúng hay không    |

---

### **12. `ProgressHistory` — Dữ liệu thống kê tiến độ**

| Tên trường   | Kiểu dữ liệu  | Mô tả        |
| ------------ | ------------- | ------------ |
| `history_id` | INT, PK, AUTO | ID dòng      |
| `student_id` | INT, FK       | Học sinh     |
| `exam_id`    | INT, FK       | Đề thi       |
| `score`      | FLOAT         | Điểm số      |
| `taken_at`   | DATETIME      | Ngày làm bài |

---
| Tên trường      | Kiểu dữ liệu  | Mô tả                 |
| --------------- | ------------- | --------------------- |
| `assignment_id` | INT, PK, AUTO | ID bài tập            |
| `creator_id`    | INT, FK       | Giáo viên tạo bài tập |
| `class_id`      | INT, FK       | Áp dụng cho lớp nào   |
| `title`         | VARCHAR(100)  | Tên bài tập           |
| `description`   | TEXT          | Mô tả ngắn            |
| `deadline`      | DATETIME      | Hạn chót nộp bài      |
| `created_at`    | DATETIME      | Ngày tạo              |

---

### **13. `Assignments` — Bài tập**

| Tên trường      | Kiểu dữ liệu  | Mô tả                 |
| --------------- | ------------- | --------------------- |
| `assignment_id` | INT, PK, AUTO | ID bài tập            |
| `creator_id`    | INT, FK       | Giáo viên tạo bài tập |
| `class_id`      | INT, FK       | Áp dụng cho lớp nào   |
| `title`         | VARCHAR(100)  | Tên bài tập           |
| `description`   | TEXT          | Mô tả ngắn            |
| `deadline`      | DATETIME      | Hạn chót nộp bài      |
| `created_at`    | DATETIME      | Ngày tạo              |

---

### **14. `AssignmentQuestions` — Câu hỏi trong bài tập**

| Tên trường               | Kiểu dữ liệu  | Mô tả             |
| ------------------------ | ------------- | ----------------- |
| `assignment_question_id` | INT, PK, AUTO | ID dòng           |
| `assignment_id`          | INT, FK       | Thuộc bài tập nào |
| `question_id`            | INT, FK       | Câu hỏi nào       |

---

### **15. `StudentAssignments` — Học sinh làm bài tập**

| Tên trường              | Kiểu dữ liệu  | Mô tả                    |
| ----------------------- | ------------- | ------------------------ |
| `student_assignment_id` | INT, PK, AUTO | ID dòng                  |
| `assignment_id`         | INT, FK       | Thuộc bài tập nào        |
| `student_id`            | INT, FK       | Học sinh nào             |
| `start_time`            | DATETIME      | Bắt đầu làm bài          |
| `end_time`              | DATETIME      | Nộp bài xong             |
| `score`                 | FLOAT         | Điểm số (nếu có tự chấm) |

---

### **16. `StudentAssignmentAnswers` — Câu trả lời trong bài tập**

| Tên trường              | Kiểu dữ liệu  | Mô tả                |
| ----------------------- | ------------- | -------------------- |
| `assignment_answer_id`  | INT, PK, AUTO | ID dòng trả lời      |
| `student_assignment_id` | INT, FK       | Bài tập của học sinh |
| `question_id`           | INT, FK       | Câu hỏi nào          |
| `selected_option_id`    | INT, FK       | Đáp án đã chọn       |
| `is_correct`            | BOOLEAN       | Có đúng hay không    |

---

Link sơ đồ diagram cho csdl trên [Diagram](https://dbdiagram.io/d/onthitracnghi-68160fa91ca52373f54ef56a)