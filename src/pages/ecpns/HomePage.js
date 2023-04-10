import React, { useEffect, useState } from "react";
import SEO from "../../components/ecpns/common/SEO";
import Header from "../../components/ecpns/Header";
import Footer from "../../components/ecpns/Footer";
import Banner from "./home/Banner";
import ExamCategories from "./home/exams/ExamCategories";
import ExamLists from "./home/exams/ExamLists";
import CourseLists from "./home/courses/CourseLists";
import Testimonials from "./home/Testimonials";

export default function HomePage() {
  const [examCategories, setExamCategories] = useState([]);
  const [quizzes, setQuizzes] = useState([]);
  const [lmsCategories, setLmsCategories] = useState([]);
  const [lmsSeries, setLmsSeries] = useState([]);
  const [testimonies, setTestimonies] = useState([]);

  const fetchHomeData = () => {
    fetch(`http://localhost:8000/api/v1/public/home-data`)
      .then((response) => response.json())
      .then((response) => {
        setExamCategories(response.categories);
        setQuizzes(response.quizzes);
        setLmsCategories(response.lms_cates);
        setLmsSeries(response.lms_series);
        setTestimonies(response.testimonies);
      })
      .catch((err) => {
        console.log(`Failed to fetch data from server.`, err);
      });
  };

  useEffect(() => {
    fetchHomeData();
  }, []);

  return (
    <>
      <SEO title="YaPresindo" />

      <Header
        styles="header-transparent header-style-2"
        searchDisable
        buttonStyle="bg-color-white"
      />

      <Banner />

      <ExamCategories />

      <ExamLists items={quizzes} />

      <CourseLists items={lmsSeries} />

      <Testimonials items={testimonies} />

      <Footer />
    </>
  );
}
