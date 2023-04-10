import React from "react";
import Slider from "react-slick";
import Exam from "./Exam";
import SectionTitle from "../../../../components/ecpns/common/SectionTitle";
import { ThreeColumnCarousel } from "../../../../utils/script";
import { server_url } from "../../../../utils/ecpns";

export default function ExamLists({ items }) {
  return (
    <div className="eduvibe-home-five-course slider-dots edu-course-area edu-section-gap bg-image">
      <div className="container eduvibe-animated-shape">
        <div className="row g-5">
          <div className="col-lg-6">
            <SectionTitle
              classes="text-start"
              slogan="Exams"
              title="Our Exams"
            />
          </div>
          <div className="col-lg-6">
            <div className="view-more-btn text-end">
              <a className="edu-btn" href={server_url("/exam/categories")}>
                Browse All Exams
                <i className="icon-arrow-right-line-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div className="row g-5 mt--10">
          <div className="col-lg-12">
            <Slider
              className="slick-activation-wrapper course-activation-3 edu-slick-button"
              {...ThreeColumnCarousel}
            >
              {items.map((item) => (
                <div className="single-slick-card" key={item.id}>
                  <Exam data={item} />
                </div>
              ))}
            </Slider>
          </div>
        </div>

        <div className="shape-dot-wrapper shape-wrapper d-xl-block d-none">
          <div className="shape-image shape-image-1">
            <img src="/images/shapes/shape-13-10.png" alt="Shape Thumb" />
          </div>
          <div className="shape-image shape-image-2">
            <img src="/images/shapes/shape-04-03.png" alt="Shape Thumb" />
          </div>
          <div className="shape-image shape-image-3">
            <img src="/images/shapes/shape-15-03.png" alt="Shape Thumb" />
          </div>
          <div className="shape-image shape-image-4">
            <img src="/images/shapes/shape-03-07.png" alt="Shape Thumb" />
          </div>
        </div>
      </div>
    </div>
  );
}
