import React from "react";
import Slider from "react-slick";
import { testi_image_url } from "../../../utils/ecpns";

const PrevArrow = (props) => {
  const { onClick } = props;
  return (
    <button className="slide-arrow prev-arrow slick-arrow" onClick={onClick}>
      <i className="icon-arrow-left-line"></i>
    </button>
  );
};

const NextArrow = (props) => {
  const { onClick } = props;
  return (
    <button className="slide-arrow next-arrow slick-arrow" onClick={onClick}>
      <i className="icon-arrow-right-line"></i>
    </button>
  );
};

export default function TestimonialsContent(props) {
  const sliderSettings = {
    dots: props.dots === "enable" ? true : false,
    infinite: true,
    arrows: props.arrows === "disable" ? false : true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    fade: props.fade === "disable" ? false : true,
    nextArrow: <NextArrow />,
    prevArrow: <PrevArrow />,
  };

  const classes = `eduvibe-testimonial-three inner testimonial-card-activation-1 slick-arrow-style-2 ${
    props.className ? props.className : ""
  }`;
  return (
    <Slider className={classes} {...sliderSettings}>
      {props.items.map((item, i) => (
        <div className={props.itemClass || "single-card"} key={i}>
          {props.rating !== "disable" && (
            <div className="rating eduvibe-course-rating-stars">
              {[...Array(5)].map((_, index) => {
                return (
                  <i
                    key={index}
                    className={index < 5 ? "on icon-Star" : "off icon-Star"}
                  ></i>
                );
              })}
            </div>
          )}
          <p className="description">“{item.description}”</p>
          <div className="client-info">
            <div className="thumbnail">
              <img src={testi_image_url(item.image)} alt="Client Thumb" />
            </div>
            <div className="content">
              <h6 className="title">{item.name}</h6>
              <span className="designation">{item.designation}</span>
            </div>
          </div>
        </div>
      ))}
    </Slider>
  );
}
