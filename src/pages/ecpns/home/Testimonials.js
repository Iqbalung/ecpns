import React from "react";
import TestimonialsContent from "./TestimonialsContent";

export default function Testimonials() {
  return (
    <>
      <div className="eduvibe-home-two-testimonial edu-testimonial-area testimonial-card-box-bg edu-section-gap bg-image">
        <div className="container">
          <div className="row g-5">
            <div className="col-lg-12">
              <div className="section-title text-center">
                <span className="pre-title">Testimonial</span>
                <h3 className="title">Our Students Feedback</h3>
              </div>
            </div>
          </div>
          <div className="edu-testimonial-activation testimonial-item-3 mt--40 edu-slick-button">
            <TestimonialsContent />
          </div>
        </div>
      </div>
    </>
  );
}
