CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

-- BẢNG NGƯỜI DÙNG
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('student', 'teacher'),
    avatar_url VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- BẢNG LỚP HỌC
CREATE TABLE Classes (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_id INT,
    class_code VARCHAR(20) UNIQUE,
    class_name VARCHAR(100),
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES Users(user_id)
);

-- BẢNG HỌC SINH THAM GIA LỚP
CREATE TABLE ClassStudents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT,
    student_id INT,
    joined_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (class_id) REFERENCES Classes(class_id),
    FOREIGN KEY (student_id) REFERENCES Users(user_id)
);

-- BẢNG THÔNG BÁO
CREATE TABLE Announcements (
    announcement_id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT,
    sender_id INT,
    title VARCHAR(200),
    content TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (class_id) REFERENCES Classes(class_id),
    FOREIGN KEY (sender_id) REFERENCES Users(user_id)
);

-- BẢNG TÀI LIỆU
CREATE TABLE Materials (
    material_id INT AUTO_INCREMENT PRIMARY KEY,
    uploader_id INT,
    class_id INT,
    title VARCHAR(200),
    description TEXT,
    file_url VARCHAR(255),
    shared_with_teachers BOOLEAN DEFAULT FALSE,
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploader_id) REFERENCES Users(user_id),
    FOREIGN KEY (class_id) REFERENCES Classes(class_id)
);

-- BẢNG CÂU HỎI
CREATE TABLE Questions (
    question_id INT AUTO_INCREMENT PRIMARY KEY,
    creator_id INT,
    subject VARCHAR(100),
    chapter VARCHAR(100),
    content TEXT,
    image_url VARCHAR(255),
    audio_url VARCHAR(255),
    math_formula TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (creator_id) REFERENCES Users(user_id)
);

-- BẢNG ĐÁP ÁN
CREATE TABLE Options (
    option_id INT AUTO_INCREMENT PRIMARY KEY,
    question_id INT,
    content TEXT,
    is_correct BOOLEAN,
    FOREIGN KEY (question_id) REFERENCES Questions(question_id)
);

-- BẢNG ĐỀ THI
CREATE TABLE Exams (
    exam_id INT AUTO_INCREMENT PRIMARY KEY,
    creator_id INT,
    class_id INT,
    title VARCHAR(200),
    description TEXT,
    duration_minutes INT,
    total_score FLOAT,
    exam_date DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (creator_id) REFERENCES Users(user_id),
    FOREIGN KEY (class_id) REFERENCES Classes(class_id)
);

-- BẢNG CÂU HỎI TRONG ĐỀ THI
CREATE TABLE ExamQuestions (
    exam_question_id INT AUTO_INCREMENT PRIMARY KEY,
    exam_id INT,
    question_id INT,
    FOREIGN KEY (exam_id) REFERENCES Exams(exam_id),
    FOREIGN KEY (question_id) REFERENCES Questions(question_id)
);

-- BẢNG HỌC SINH LÀM BÀI THI
CREATE TABLE StudentExams (
    student_exam_id INT AUTO_INCREMENT PRIMARY KEY,
    exam_id INT,
    student_id INT,
    start_time DATETIME,
    end_time DATETIME,
    score FLOAT,
    FOREIGN KEY (exam_id) REFERENCES Exams(exam_id),
    FOREIGN KEY (student_id) REFERENCES Users(user_id)
);

-- BẢNG TRẢ LỜI CÂU HỎI TRONG BÀI THI
CREATE TABLE StudentExamAnswers (
    answer_id INT AUTO_INCREMENT PRIMARY KEY,
    student_exam_id INT,
    question_id INT,
    selected_option_id INT,
    is_correct BOOLEAN,
    FOREIGN KEY (student_exam_id) REFERENCES StudentExams(student_exam_id),
    FOREIGN KEY (question_id) REFERENCES Questions(question_id),
    FOREIGN KEY (selected_option_id) REFERENCES Options(option_id)
);

-- BẢNG BÀI TẬP
CREATE TABLE Assignments (
    assignment_id INT AUTO_INCREMENT PRIMARY KEY,
    creator_id INT NOT NULL,
    class_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    deadline DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (creator_id) REFERENCES Users(user_id),
    FOREIGN KEY (class_id) REFERENCES Classes(class_id)
);

-- BẢNG CÂU HỎI TRONG BÀI TẬP
CREATE TABLE AssignmentQuestions (
    assignment_question_id INT AUTO_INCREMENT PRIMARY KEY,
    assignment_id INT NOT NULL,
    question_id INT NOT NULL,
    FOREIGN KEY (assignment_id) REFERENCES Assignments(assignment_id),
    FOREIGN KEY (question_id) REFERENCES Questions(question_id)
);

-- BẢNG HỌC SINH LÀM BÀI TẬP
CREATE TABLE StudentAssignments (
    student_assignment_id INT AUTO_INCREMENT PRIMARY KEY,
    assignment_id INT NOT NULL,
    student_id INT NOT NULL,
    start_time DATETIME,
    end_time DATETIME,
    score FLOAT,
    FOREIGN KEY (assignment_id) REFERENCES Assignments(assignment_id),
    FOREIGN KEY (student_id) REFERENCES Users(user_id)
);

-- BẢNG TRẢ LỜI CÂU HỎI TRONG BÀI TẬP
CREATE TABLE StudentAssignmentAnswers (
    assignment_answer_id INT AUTO_INCREMENT PRIMARY KEY,
    student_assignment_id INT NOT NULL,
    question_id INT NOT NULL,
    selected_option_id INT,
    is_correct BOOLEAN,
    FOREIGN KEY (student_assignment_id) REFERENCES StudentAssignments(student_assignment_id),
    FOREIGN KEY (question_id) REFERENCES Questions(question_id),
    FOREIGN KEY (selected_option_id) REFERENCES Options(option_id)
);
