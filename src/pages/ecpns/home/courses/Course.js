import React from "react";
import { Link } from "react-router-dom";
import { lms_image_url, view_lms_url } from "../../../../utils/ecpns";

export default function Course({ data, classes }) {
  const price = Number(data.price);
  const oldPrice = data.oldPrice ? Number(data.oldPrice) : 0;
  const isOffer = data.oldPrice && price < oldPrice;
  const offerInPercentage = Math.round((100 * (oldPrice - price)) / oldPrice);
  return (
    <div
      className={`edu-card card-type-5 radius-small ${classes ? classes : ""}`}
    >
      <div className="inner">
        <div className="thumbnail">
          <a href={view_lms_url(data.slug)}>
            <img
              className="w-100"
              src={lms_image_url(data.image)}
              alt="Course Thumb"
            />
          </a>
          <div className="top-position status-group left-top">
            <span
              className={`eduvibe-status status-01 ${
                data.is_paid === 0 ? "bg-secondary-color" : "bg-primary-color"
              }`}
            >
              {data.is_paid === 0 ? "Free" : "Premium"} Exam
            </span>
          </div>
          <div className="wishlist-top-right">
            <button className="wishlist-btn">
              <i className="icon-Heart"></i>
            </button>
          </div>
        </div>
        <div className="content">
          <div className="price-list price-style-03">
            {data.is_paid === 0 ? (
              <div className="price current-price">Free</div>
            ) : (
              <div className="price current-price">Rp. {data.cost}</div>
            )}
            {data.oldPrice && (
              <div className="price old-price">${data.oldPrice}</div>
            )}
          </div>
          <h6 className="title">
            <a href={view_lms_url(data.slug)}>{data.title}</a>
          </h6>
          <ul className="edu-meta meta-01">
            <li>Total Items: {data.total_items}</li>
            {/* <li>
              <i className="icon-group-line"></i>
              {data.student} Students
            </li> */}
          </ul>
          <div className="card-bottom">
            <div className="read-more-btn">
              <a className="btn-transparent" href={view_lms_url(data.slug)}>
                View<i className="icon-arrow-right-line-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
