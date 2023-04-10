import React from "react";
import Course from "./Course";
import SectionTitle from "../../../../components/ecpns/common/SectionTitle";
import { server_url } from "../../../../utils/ecpns";

export default function CourseLists({ items }) {
  return (
    <>
      <div className="edu-course-area edu-section-gap bg-color-white">
        <div className="container">
          <div className="row">
            <div className="col-lg-12">
              <SectionTitle
                classes="text-center"
                slogan="LMS"
                title="Popular Courses"
              />
            </div>
          </div>

          <div className="row g-5 mt--10">
            {items.map((item) => (
              <div className="col-12 col-sm-6 col-lg-4" key={item.id}>
                <Course data={item} />
              </div>
            ))}
          </div>

          <div className="row">
            <div className="col-lg-12">
              <div className="load-more-btn mt--60 text-center">
                <a className="edu-btn" href={server_url("/LMS/all-categories")}>
                  Browse All Categories
                  <i className="icon-arrow-right-line-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
}
