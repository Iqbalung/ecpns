import React from "react";
import { Link } from "react-router-dom";

function server_url(to) {
  return `http://localhost:8000${to}`;
}

export default function Nav() {
  return (
    <ul className="mainmenu">
      <li>
        <Link to="/">Home</Link>
      </li>

      <li className="has-droupdown">
        <Link to="#">Courses</Link>
        <ul className="submenu">
          <li>
            <a href={server_url("/site/courses")}>Browse</a>
          </li>
          <li>
            <a href={server_url("/site/patterns")}>Patterns</a>
          </li>
          <li>
            <a href={server_url("/site/syllabus")}>Syllabus</a>
          </li>
          <li>
            <a href={server_url("/practice-exams")}>Practice Exams</a>
          </li>
        </ul>
      </li>

      <li>
        <a href={server_url("/LMS/all-categories")}>LMS</a>
      </li>

      <li>
        <a href={server_url("/site/pricing")}>Pricing</a>
      </li>

      <li className="has-droupdown">
        <Link to="#">About</Link>
        <ul className="submenu">
          <li>
            <a href={server_url("/page/why-us")}>Why Us</a>
          </li>
          <li>
            <a href={server_url("/site/about-us")}>About Us</a>
          </li>
          <li>
            <Link to="#">Our Mission</Link>
          </li>
          <li>
            <a href={server_url("/contact-us")}>Contact Us</a>
          </li>
        </ul>
      </li>

      <li className="has-droupdown">
        <Link to="#">More</Link>
        <ul className="submenu">
          <li>
            <a href={server_url("/blogs")}>Blogs</a>
          </li>
          <li>
            <a href={server_url("/faqs")}>FAQs</a>
          </li>
        </ul>
      </li>
    </ul>
  );
}
