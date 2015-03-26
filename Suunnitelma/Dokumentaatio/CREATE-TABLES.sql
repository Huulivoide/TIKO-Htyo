CREATE TABLE "access_levels"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL
);


CREATE TABLE "users"
(
    "id" SERIAL PRIMARY KEY,
    "login" TEXT NOT NULL UNIQUE,
    "password" TEXT NOT NULL,
    "access_level_id" INTEGER REFERENCES "access_levels"("id"),
    "phone" TEXT NOT NULL UNIQUE,
    "email" TEXT NOT NULL UNIQUE,
    "first_name" TEXT NOT NULL,
    "other_name" TEXT,
    "last_name" TEXT NOT NULL
);


CREATE TABLE "groups"
(
    "id" SERIAL PRIMARY KEY,
    "tutor_id" INTEGER NOT NULL REFERENCES "users"("id")
);


CREATE TABLE "program_structures"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "year" INTEGER NOT NULL,
    UNIQUE("name", "year")
);


CREATE TABLE "students"
(
    "user_id" INTEGER PRIMARY KEY REFERENCES "users"("id"),
    "entry_year" INTEGER NOT NULL,
    "tutor_id" INTEGER REFERENCES "users"("id"),
    "program_structure_id" INTEGER NOT NULL REFERENCES "program_structures"("id"),
    "group_id" INTEGER REFERENCES "groups"("id")
);


CREATE TABLE "meetings"
(
    "id" SERIAL PRIMARY KEY,
    "date" DATE NOT NULL,
    "group_id" INTEGER REFERENCES "groups"("id"),
    "user_id" INTEGER REFERENCES "users"("id"),
    "report" TEXT NOT NULL
);


CREATE TABLE "meetings_students"
(
    "student_id" INTEGER REFERENCES "students"("user_id"),
    "meeting_id" INTEGER REFERENCES "meetings"("id"),
    PRIMARY KEY("student_id", "meeting_id")
);


CREATE TABLE "courses"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL,
    "year" INTEGER NOT NULL,
    "credits" INTEGER NOT NULL,
    UNIQUE("name", "year")
);


CREATE TABLE "course_types"
(
    "id" SERIAL PRIMARY KEY,
    "name" TEXT NOT NULL UNIQUE
);


CREATE TABLE "courses_course_types"
(
    "course_id" INTEGER REFERENCES "courses"("id"),
    "course_type_id" INTEGER REFERENCES "course_types"("id"),
    PRIMARY KEY("course_id", "course_type_id")
);


CREATE TABLE "courses_program_structures"
(
    "course_id" INTEGER REFERENCES "courses"("id"),
    "program_structure_id" INTEGER REFERENCES "program_structures"("id"),
    PRIMARY KEY("course_id", "program_structure_id")
);


CREATE TABLE "program_requirements"
(
    "course_type_id" INTEGER REFERENCES "course_types"("id"),
    "program_structure_id" INTEGER REFERENCES "program_structures"("id"),
    "credits" INTEGER NOT NULL,
    PRIMARY KEY("course_type_id", "program_structure_id")
);


CREATE TABLE "forms"
(
    "id" SERIAL PRIMARY KEY,
    "student_id" INTEGER NOT NULL REFERENCES "students"("user_id"),
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
    "course_id" INTEGER REFERENCES "courses"("id"),
    "form_id" INTEGER REFERENCES "forms"("id"),
    "student_id" INTEGER REFERENCES "students"("user_id"),
    "planned_finishing_date" DATE NOT NULL,
    "finishing_date" DATE NOT NULL,
    PRIMARY KEY("course_id", "student_id")
);
