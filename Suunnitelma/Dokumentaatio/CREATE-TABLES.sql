
CREATE TABLE "access_level"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL
);


CREATE TABLE "user"
(
    "id" SERIAL PRIMARY KEY,
    "login" TEXT NOT NULL UNIQUE,
    "password" TEXT NOT NULL,
    "access_level_id" INTEGER REFERENCES "access_level"("id"),
    "phone" TEXT NOT NULL UNIQUE,
    "email" TEXT NOT NULL UNIQUE,
    "first_name" TEXT NOT NULL,
    "other_name" TEXT,
    "last_name" TEXT NOT NULL
);


CREATE TABLE "group"
(
    "id" SERIAL PRIMARY KEY,
    "tutor_id" INTEGER NOT NULL REFERENCES "user"("id")
);


CREATE TABLE "program_structure"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "year" INTEGER NOT NULL,
    UNIQUE("name", "year")
);


CREATE TABLE "student"
(
    "user_id" INTEGER PRIMARY KEY REFERENCES "user"("id"),
    "entry_year" INTEGER NOT NULL,
    "turor_id" INTEGER REFERENCES "user"("id"),
    "program_structure_id" INTEGER NOT NULL REFERENCES "program_structure"("id"),
    "group_id" INTEGER REFERENCES "group"("id")
);


CREATE TABLE "meeting"
(
    "id" SERIAL PRIMARY KEY,
    "date" DATE NOT NULL,
    "group_id" INTEGER REFERENCES "group"("id"),
    "user_id" INTEGER REFERENCES "user"("id"),
    "report" TEXT NOT NULL
);


CREATE TABLE "meeting_students"
(
    "student_id" INTEGER REFERENCES "student"("user_id"),
    "meeting_id" INTEGER REFERENCES "meeting"("id"),
    PRIMARY KEY("student_id", "meeting_id")
);


CREATE TABLE "course"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "year" INTEGER NOT NULL,
    "credits" INTEGER NOT NULL,
    UNIQUE("name", "year")
);


CREATE TABLE "course_type"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL UNIQUE
);


CREATE TABLE "courses_course_types"
(
    "course_id" INTEGER REFERENCES "course"("id"),
    "course_type_id" INTEGER REFERENCES "course_type"("id"),
    PRIMARY KEY("course_id", "course_type_id")
);


CREATE TABLE "courses_program_structures"
(
    "course_id" INTEGER REFERENCES "course"("id"),
    "program_structure_id" INTEGER REFERENCES "program_structure"("id"),
    PRIMARY KEY("course_id", "program_structure_id")
);


CREATE TABLE "program_requirement"
(
    "course_type_id" INTEGER REFERENCES "course_type"("id"),
    "program_structure_id" INTEGER REFERENCES "program_structure"("id"),
    "credits" INTEGER NOT NULL,
    PRIMARY KEY("course_type_id", "program_structure_id")
);


CREATE TABLE "form"
(
    "id" SERIAL PRIMARY KEY,
    "student_id" INTEGER NOT NULL REFERENCES "student"("user_id"),
    "time" TIMESTAMP NOT NULL,
    "works" BOOLEAN NOT NULL,
    "weekly_hours" INTEGER NOT NULL,
    "working_reason" TEXT NOT NULL,
    "interest" TEXT NOT NULL,
    "secondary_interest" TEXT NOT NULL,
    "last_year_positive" TEXT NOT NULL,
    "last_year_negative" TEXT NOT NULL
);


CREATE TABLE "courses_students"
(
    "course_id" INTEGER REFERENCES "course"("id"),
    "form_id" INTEGER REFERENCES "form"("id"),
    "student_id" INTEGER REFERENCES "student"("user_id"),
    "planned_finishing_date" DATE NOT NULL,
    "finishing_date" DATE NOT NULL,
    PRIMARY KEY("course_id", "student_id")
);
