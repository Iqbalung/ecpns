import React from "react";
import Course from "./Course";
import { Link } from "react-router-dom";
import SectionTitle from "../../../../components/ecpns/common/SectionTitle";
import CourseData from "../../../../data/course/CourseData.json";

export default function CourseLists() {
  const CourseItems = CourseData.slice(0, 6);
  return (
    <>
      <div className="edu-course-area edu-section-gap bg-color-white">
        <div className="container">
          <div className="row">
            <div className="col-lg-12">
              <SectionTitle
                classes="text-center"
                slogan="Popular Courses"
                title="Our Popular Courses"
              />
            </div>
          </div>

          <div className="row g-5 mt--10">
            {CourseItems.map((item) => (
              <div className="col-12 col-sm-6 col-lg-4" key={item.id}>
                <Course data={item} />
              </div>
            ))}
          </div>

          <div className="row">
            <div className="col-lg-12">
              <div className="load-more-btn mt--60 text-center">
                <Link className="edu-btn" to="/site/courses">
                  View All Courses
                  <i className="icon-arrow-right-line-right"></i>
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}
