--
-- PostgreSQL database dump
--

-- Dumped from database version 11.3 (Ubuntu 11.3-1.pgdg16.04+1)
-- Dumped by pg_dump version 12.1 (Ubuntu 12.1-1.pgdg16.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

--
-- Name: banners; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.banners (
    id integer NOT NULL,
    title_uz character varying(255) NOT NULL,
    title_ru character varying(255) NOT NULL,
    title_en character varying(255) NOT NULL,
    description_uz text NOT NULL,
    description_ru text NOT NULL,
    description_en text NOT NULL,
    url character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    category_id integer NOT NULL,
    status smallint NOT NULL,
    file character varying(255),
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.banners OWNER TO dev_shop;

--
-- Name: banners_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.banners_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.banners_id_seq OWNER TO dev_shop;

--
-- Name: banners_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.banners_id_seq OWNED BY public.banners.id;


--
-- Name: blog_news; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.blog_news (
    id integer NOT NULL,
    title_uz character varying(255) NOT NULL,
    title_ru character varying(255) NOT NULL,
    title_en character varying(255) NOT NULL,
    description_uz text NOT NULL,
    description_ru text NOT NULL,
    description_en text NOT NULL,
    body_uz text NOT NULL,
    body_ru text NOT NULL,
    body_en text NOT NULL,
    category_id integer NOT NULL,
    is_published boolean DEFAULT false NOT NULL,
    file character varying(255),
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.blog_news OWNER TO dev_shop;

--
-- Name: blog_news_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.blog_news_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.blog_news_id_seq OWNER TO dev_shop;

--
-- Name: blog_news_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.blog_news_id_seq OWNED BY public.blog_news.id;


--
-- Name: blog_posts; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.blog_posts (
    id integer NOT NULL,
    title_uz character varying(255) NOT NULL,
    title_ru character varying(255) NOT NULL,
    title_en character varying(255) NOT NULL,
    description_uz text NOT NULL,
    description_ru text NOT NULL,
    description_en text NOT NULL,
    body_uz text NOT NULL,
    body_ru text NOT NULL,
    body_en text NOT NULL,
    category_id bigint NOT NULL,
    status smallint NOT NULL,
    file character varying(255),
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.blog_posts OWNER TO dev_shop;

--
-- Name: blog_posts_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.blog_posts_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.blog_posts_id_seq OWNER TO dev_shop;

--
-- Name: blog_posts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.blog_posts_id_seq OWNED BY public.blog_posts.id;


--
-- Name: blog_videos; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.blog_videos (
    id integer NOT NULL,
    title_uz character varying(255) NOT NULL,
    title_ru character varying(255) NOT NULL,
    title_en character varying(255) NOT NULL,
    description_uz text NOT NULL,
    description_ru text NOT NULL,
    description_en text NOT NULL,
    body_uz text NOT NULL,
    body_ru text NOT NULL,
    body_en text NOT NULL,
    category_id bigint NOT NULL,
    status smallint NOT NULL,
    poster character varying(255),
    video character varying(255),
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.blog_videos OWNER TO dev_shop;

--
-- Name: blog_videos_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.blog_videos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.blog_videos_id_seq OWNER TO dev_shop;

--
-- Name: blog_videos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.blog_videos_id_seq OWNED BY public.blog_videos.id;


--
-- Name: brands; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.brands (
    id bigint NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    logo character varying(255),
    meta_json json,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.brands OWNER TO dev_shop;

--
-- Name: brands_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.brands_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.brands_id_seq OWNER TO dev_shop;

--
-- Name: brands_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.brands_id_seq OWNED BY public.brands.id;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.categories (
    id bigint NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    description_uz text,
    description_ru text,
    description_en text,
    slug character varying(255) NOT NULL,
    meta_json json,
    "left" integer NOT NULL,
    "right" integer NOT NULL,
    parent_id bigint,
    photo character varying(255) NOT NULL,
    icon character varying(255) NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.categories OWNER TO dev_shop;

--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categories_id_seq OWNER TO dev_shop;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- Name: delivery_methods; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.delivery_methods (
    id bigint NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    description_uz text,
    description_ru text,
    description_en text,
    cost integer NOT NULL,
    min_weight double precision NOT NULL,
    max_weight double precision NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.delivery_methods OWNER TO dev_shop;

--
-- Name: delivery_methods_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.delivery_methods_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.delivery_methods_id_seq OWNER TO dev_shop;

--
-- Name: delivery_methods_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.delivery_methods_id_seq OWNED BY public.delivery_methods.id;


--
-- Name: discounts; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.discounts (
    id integer NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    description_uz text NOT NULL,
    description_ru text NOT NULL,
    description_en text NOT NULL,
    start_date timestamp(0) without time zone NOT NULL,
    end_date timestamp(0) without time zone NOT NULL,
    category_id integer NOT NULL,
    common boolean DEFAULT false NOT NULL,
    status smallint NOT NULL,
    photo character varying(255),
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.discounts OWNER TO dev_shop;

--
-- Name: discounts_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.discounts_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.discounts_id_seq OWNER TO dev_shop;

--
-- Name: discounts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.discounts_id_seq OWNED BY public.discounts.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO dev_shop;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO dev_shop;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO dev_shop;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO dev_shop;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: pages; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.pages (
    id integer NOT NULL,
    title_uz character varying(255) NOT NULL,
    title_ru character varying(255) NOT NULL,
    title_en character varying(255) NOT NULL,
    menu_title_uz character varying(255),
    menu_title_ru character varying(255),
    menu_title_en character varying(255),
    slug character varying(255) NOT NULL,
    description_uz text NOT NULL,
    description_ru text NOT NULL,
    description_en text NOT NULL,
    body_uz text NOT NULL,
    body_ru text NOT NULL,
    body_en text NOT NULL,
    parent_id integer,
    "left" integer NOT NULL,
    "right" integer NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.pages OWNER TO dev_shop;

--
-- Name: pages_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.pages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pages_id_seq OWNER TO dev_shop;

--
-- Name: pages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.pages_id_seq OWNED BY public.pages.id;


--
-- Name: payments; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.payments (
    id integer NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    logo character varying(255) NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.payments OWNER TO dev_shop;

--
-- Name: payments_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.payments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.payments_id_seq OWNER TO dev_shop;

--
-- Name: payments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.payments_id_seq OWNED BY public.payments.id;


--
-- Name: profiles; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.profiles (
    user_id bigint NOT NULL,
    first_name character varying(255),
    last_name character varying(255),
    birth_date date,
    gender smallint,
    address text,
    avatar character varying(255)
);


ALTER TABLE public.profiles OWNER TO dev_shop;

--
-- Name: shop_carts; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_carts (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    product_id bigint NOT NULL,
    modification_id bigint,
    quantity integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_carts OWNER TO dev_shop;

--
-- Name: shop_carts_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_carts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_carts_id_seq OWNER TO dev_shop;

--
-- Name: shop_carts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_carts_id_seq OWNED BY public.shop_carts.id;


--
-- Name: shop_category_brands; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_category_brands (
    category_id bigint NOT NULL,
    brand_id bigint NOT NULL
);


ALTER TABLE public.shop_category_brands OWNER TO dev_shop;

--
-- Name: shop_characteristic_categories; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_characteristic_categories (
    characteristic_id bigint NOT NULL,
    category_id bigint NOT NULL
);


ALTER TABLE public.shop_characteristic_categories OWNER TO dev_shop;

--
-- Name: shop_characteristic_groups; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_characteristic_groups (
    id integer NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    "order" integer NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_characteristic_groups OWNER TO dev_shop;

--
-- Name: shop_characteristic_groups_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_characteristic_groups_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_characteristic_groups_id_seq OWNER TO dev_shop;

--
-- Name: shop_characteristic_groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_characteristic_groups_id_seq OWNED BY public.shop_characteristic_groups.id;


--
-- Name: shop_characteristics; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_characteristics (
    id bigint NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    group_id integer NOT NULL,
    status smallint NOT NULL,
    type character varying(255) NOT NULL,
    "default" character varying(255),
    required boolean NOT NULL,
    variants json,
    hide_in_filters boolean NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_characteristics OWNER TO dev_shop;

--
-- Name: shop_characteristics_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_characteristics_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_characteristics_id_seq OWNER TO dev_shop;

--
-- Name: shop_characteristics_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_characteristics_id_seq OWNED BY public.shop_characteristics.id;


--
-- Name: shop_delivery_methods; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_delivery_methods (
    id bigint NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    cost integer NOT NULL,
    min_weight double precision NOT NULL,
    max_weight double precision NOT NULL,
    sort integer NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_delivery_methods OWNER TO dev_shop;

--
-- Name: shop_delivery_methods_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_delivery_methods_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_delivery_methods_id_seq OWNER TO dev_shop;

--
-- Name: shop_delivery_methods_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_delivery_methods_id_seq OWNED BY public.shop_delivery_methods.id;


--
-- Name: shop_discounts; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_discounts (
    id bigint NOT NULL,
    store_id bigint NOT NULL,
    discount_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_discounts OWNER TO dev_shop;

--
-- Name: shop_discounts_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_discounts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_discounts_id_seq OWNER TO dev_shop;

--
-- Name: shop_discounts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_discounts_id_seq OWNED BY public.shop_discounts.id;


--
-- Name: shop_marks; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_marks (
    id bigint NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    photo character varying(255),
    meta_json json,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_marks OWNER TO dev_shop;

--
-- Name: shop_marks_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_marks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_marks_id_seq OWNER TO dev_shop;

--
-- Name: shop_marks_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_marks_id_seq OWNED BY public.shop_marks.id;


--
-- Name: shop_modifications; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_modifications (
    id bigint NOT NULL,
    product_id bigint NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    code character varying(20) NOT NULL,
    characteristic_id bigint,
    price_uzs integer NOT NULL,
    price_usd double precision,
    type smallint NOT NULL,
    value character varying(50),
    color character varying(15),
    photo character varying(50),
    sort integer NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_modifications OWNER TO dev_shop;

--
-- Name: shop_modifications_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_modifications_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_modifications_id_seq OWNER TO dev_shop;

--
-- Name: shop_modifications_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_modifications_id_seq OWNED BY public.shop_modifications.id;


--
-- Name: shop_order_items; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_order_items (
    id bigint NOT NULL,
    order_id bigint NOT NULL,
    product_id bigint NOT NULL,
    modification_id bigint NOT NULL,
    product_name_uz character varying(255) NOT NULL,
    product_name_ru character varying(255) NOT NULL,
    product_name_en character varying(255) NOT NULL,
    product_code character varying(255) NOT NULL,
    modification_name_uz character varying(255) NOT NULL,
    modification_name_ru character varying(255) NOT NULL,
    modification_name_en character varying(255) NOT NULL,
    modification_code character varying(255) NOT NULL,
    price integer NOT NULL,
    quantity integer NOT NULL,
    discount double precision DEFAULT '0'::double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_order_items OWNER TO dev_shop;

--
-- Name: shop_order_items_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_order_items_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_order_items_id_seq OWNER TO dev_shop;

--
-- Name: shop_order_items_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_order_items_id_seq OWNED BY public.shop_order_items.id;


--
-- Name: shop_orders; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_orders (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    delivery_method_id bigint NOT NULL,
    delivery_method_name_uz character varying(255) NOT NULL,
    delivery_method_name_ru character varying(255) NOT NULL,
    delivery_method_name_en character varying(255) NOT NULL,
    delivery_cost integer NOT NULL,
    payment_type_id integer NOT NULL,
    total_cost integer NOT NULL,
    note character varying(255) NOT NULL,
    status smallint NOT NULL,
    cancel_reason character varying(255) NOT NULL,
    statuses_json json NOT NULL,
    phone character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    delivery_index character varying(255) NOT NULL,
    delivery_address character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_orders OWNER TO dev_shop;

--
-- Name: shop_orders_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_orders_id_seq OWNER TO dev_shop;

--
-- Name: shop_orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_orders_id_seq OWNED BY public.shop_orders.id;


--
-- Name: shop_photos; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_photos (
    id bigint NOT NULL,
    product_id bigint NOT NULL,
    file character varying(255) NOT NULL,
    sort integer NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_photos OWNER TO dev_shop;

--
-- Name: shop_photos_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_photos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_photos_id_seq OWNER TO dev_shop;

--
-- Name: shop_photos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_photos_id_seq OWNED BY public.shop_photos.id;


--
-- Name: shop_product_categories; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_product_categories (
    product_id bigint NOT NULL,
    category_id bigint NOT NULL
);


ALTER TABLE public.shop_product_categories OWNER TO dev_shop;

--
-- Name: shop_product_discounts; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_product_discounts (
    id bigint NOT NULL,
    product_id bigint NOT NULL,
    discount_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_product_discounts OWNER TO dev_shop;

--
-- Name: shop_product_discounts_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_product_discounts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_product_discounts_id_seq OWNER TO dev_shop;

--
-- Name: shop_product_discounts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_product_discounts_id_seq OWNED BY public.shop_product_discounts.id;


--
-- Name: shop_product_marks; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_product_marks (
    product_id bigint NOT NULL,
    mark_id bigint NOT NULL
);


ALTER TABLE public.shop_product_marks OWNER TO dev_shop;

--
-- Name: shop_product_reviews; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_product_reviews (
    id bigint NOT NULL,
    product_id bigint NOT NULL,
    rating double precision NOT NULL,
    advantages text,
    disadvantages text,
    comment text NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.shop_product_reviews OWNER TO dev_shop;

--
-- Name: shop_product_reviews_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_product_reviews_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_product_reviews_id_seq OWNER TO dev_shop;

--
-- Name: shop_product_reviews_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_product_reviews_id_seq OWNED BY public.shop_product_reviews.id;


--
-- Name: shop_products; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_products (
    id bigint NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    description_uz text,
    description_ru text,
    description_en text,
    slug character varying(255) NOT NULL,
    price_uzs integer NOT NULL,
    price_usd double precision,
    discount double precision DEFAULT '0'::double precision NOT NULL,
    discount_ends_at timestamp(0) without time zone,
    main_category_id bigint NOT NULL,
    store_id bigint NOT NULL,
    brand_id bigint NOT NULL,
    status smallint NOT NULL,
    weight double precision,
    quantity integer,
    guarantee boolean NOT NULL,
    bestseller boolean NOT NULL,
    new boolean NOT NULL,
    rating double precision,
    number_of_reviews integer DEFAULT 0 NOT NULL,
    reject_reason text,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    main_photo_id bigint
);


ALTER TABLE public.shop_products OWNER TO dev_shop;

--
-- Name: shop_products_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.shop_products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.shop_products_id_seq OWNER TO dev_shop;

--
-- Name: shop_products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.shop_products_id_seq OWNED BY public.shop_products.id;


--
-- Name: shop_values; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.shop_values (
    product_id bigint NOT NULL,
    characteristic_id bigint NOT NULL,
    value character varying(255) NOT NULL,
    main boolean NOT NULL,
    sort integer NOT NULL
);


ALTER TABLE public.shop_values OWNER TO dev_shop;

--
-- Name: sliders; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.sliders (
    id integer NOT NULL,
    url character varying(255) NOT NULL,
    sort integer NOT NULL,
    file character varying(255),
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.sliders OWNER TO dev_shop;

--
-- Name: sliders_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.sliders_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sliders_id_seq OWNER TO dev_shop;

--
-- Name: sliders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.sliders_id_seq OWNED BY public.sliders.id;


--
-- Name: store_categories; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.store_categories (
    store_id bigint NOT NULL,
    category_id bigint NOT NULL
);


ALTER TABLE public.store_categories OWNER TO dev_shop;

--
-- Name: store_delivery_methods; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.store_delivery_methods (
    store_id bigint NOT NULL,
    delivery_method_id integer NOT NULL,
    cost integer NOT NULL,
    sort integer NOT NULL
);


ALTER TABLE public.store_delivery_methods OWNER TO dev_shop;

--
-- Name: store_marks; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.store_marks (
    store_id bigint NOT NULL,
    mark_id bigint NOT NULL
);


ALTER TABLE public.store_marks OWNER TO dev_shop;

--
-- Name: store_payments; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.store_payments (
    store_id bigint NOT NULL,
    payment_id integer NOT NULL
);


ALTER TABLE public.store_payments OWNER TO dev_shop;

--
-- Name: store_users; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.store_users (
    store_id bigint NOT NULL,
    user_id bigint NOT NULL,
    role character varying(255) NOT NULL
);


ALTER TABLE public.store_users OWNER TO dev_shop;

--
-- Name: stores; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.stores (
    id bigint NOT NULL,
    name_uz character varying(255) NOT NULL,
    name_ru character varying(255) NOT NULL,
    name_en character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    logo character varying(255) NOT NULL,
    status smallint NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.stores OWNER TO dev_shop;

--
-- Name: stores_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.stores_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.stores_id_seq OWNER TO dev_shop;

--
-- Name: stores_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.stores_id_seq OWNED BY public.stores.id;


--
-- Name: user_favorites; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.user_favorites (
    user_id bigint NOT NULL,
    product_id bigint NOT NULL
);


ALTER TABLE public.user_favorites OWNER TO dev_shop;

--
-- Name: user_networks; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.user_networks (
    user_id bigint NOT NULL,
    network character varying(255) NOT NULL,
    identity character varying(255) NOT NULL,
    emails_json json,
    phones_json json
);


ALTER TABLE public.user_networks OWNER TO dev_shop;

--
-- Name: users; Type: TABLE; Schema: public; Owner: dev_shop
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255),
    email character varying(255),
    phone character varying(255),
    phone_verified boolean DEFAULT false NOT NULL,
    password character varying(255),
    balance bigint DEFAULT '0'::bigint NOT NULL,
    verify_token character varying(255),
    phone_verify_token character varying(255),
    phone_verify_token_expire timestamp(0) without time zone,
    phone_auth boolean DEFAULT false NOT NULL,
    role character varying(255) NOT NULL,
    status integer NOT NULL,
    email_verified_at timestamp(0) without time zone,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    manager_request_status smallint DEFAULT '0'::smallint NOT NULL
);


ALTER TABLE public.users OWNER TO dev_shop;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: dev_shop
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO dev_shop;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: dev_shop
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: banners id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.banners ALTER COLUMN id SET DEFAULT nextval('public.banners_id_seq'::regclass);


--
-- Name: blog_news id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_news ALTER COLUMN id SET DEFAULT nextval('public.blog_news_id_seq'::regclass);


--
-- Name: blog_posts id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_posts ALTER COLUMN id SET DEFAULT nextval('public.blog_posts_id_seq'::regclass);


--
-- Name: blog_videos id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_videos ALTER COLUMN id SET DEFAULT nextval('public.blog_videos_id_seq'::regclass);


--
-- Name: brands id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.brands ALTER COLUMN id SET DEFAULT nextval('public.brands_id_seq'::regclass);


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: delivery_methods id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.delivery_methods ALTER COLUMN id SET DEFAULT nextval('public.delivery_methods_id_seq'::regclass);


--
-- Name: discounts id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.discounts ALTER COLUMN id SET DEFAULT nextval('public.discounts_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: pages id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.pages ALTER COLUMN id SET DEFAULT nextval('public.pages_id_seq'::regclass);


--
-- Name: payments id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.payments ALTER COLUMN id SET DEFAULT nextval('public.payments_id_seq'::regclass);


--
-- Name: shop_carts id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_carts ALTER COLUMN id SET DEFAULT nextval('public.shop_carts_id_seq'::regclass);


--
-- Name: shop_characteristic_groups id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristic_groups ALTER COLUMN id SET DEFAULT nextval('public.shop_characteristic_groups_id_seq'::regclass);


--
-- Name: shop_characteristics id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristics ALTER COLUMN id SET DEFAULT nextval('public.shop_characteristics_id_seq'::regclass);


--
-- Name: shop_delivery_methods id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_delivery_methods ALTER COLUMN id SET DEFAULT nextval('public.shop_delivery_methods_id_seq'::regclass);


--
-- Name: shop_discounts id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_discounts ALTER COLUMN id SET DEFAULT nextval('public.shop_discounts_id_seq'::regclass);


--
-- Name: shop_marks id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_marks ALTER COLUMN id SET DEFAULT nextval('public.shop_marks_id_seq'::regclass);


--
-- Name: shop_modifications id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_modifications ALTER COLUMN id SET DEFAULT nextval('public.shop_modifications_id_seq'::regclass);


--
-- Name: shop_order_items id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_order_items ALTER COLUMN id SET DEFAULT nextval('public.shop_order_items_id_seq'::regclass);


--
-- Name: shop_orders id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_orders ALTER COLUMN id SET DEFAULT nextval('public.shop_orders_id_seq'::regclass);


--
-- Name: shop_photos id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_photos ALTER COLUMN id SET DEFAULT nextval('public.shop_photos_id_seq'::regclass);


--
-- Name: shop_product_discounts id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_discounts ALTER COLUMN id SET DEFAULT nextval('public.shop_product_discounts_id_seq'::regclass);


--
-- Name: shop_product_reviews id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_reviews ALTER COLUMN id SET DEFAULT nextval('public.shop_product_reviews_id_seq'::regclass);


--
-- Name: shop_products id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_products ALTER COLUMN id SET DEFAULT nextval('public.shop_products_id_seq'::regclass);


--
-- Name: sliders id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.sliders ALTER COLUMN id SET DEFAULT nextval('public.sliders_id_seq'::regclass);


--
-- Name: stores id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.stores ALTER COLUMN id SET DEFAULT nextval('public.stores_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: banners; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.banners (id, title_uz, title_ru, title_en, description_uz, description_ru, description_en, url, slug, category_id, status, file, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: blog_news; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.blog_news (id, title_uz, title_ru, title_en, description_uz, description_ru, description_en, body_uz, body_ru, body_en, category_id, is_published, file, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: blog_posts; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.blog_posts (id, title_uz, title_ru, title_en, description_uz, description_ru, description_en, body_uz, body_ru, body_en, category_id, status, file, created_by, updated_by, created_at, updated_at) FROM stdin;
4	Konditsionerlarni tanlash mezonlari qanday?	По каким критериям выбирают кондиционеры ?	What are the criteria for choosing air conditioners?	Shuni tan olish kerakki, aksariyat hollarda konditsionerni qanday tanlash kerakligi haqidagi savolga javob birinchi navbatda unga ajratilgan byudjet tomonidan beriladi.	Следует признать, что в большинстве случаев ответ на вопрос, как выбрать кондиционер, даёт в первую очередь заложенный на него бюджет.	It should be recognized that in most cases the answer to the question of how to choose an air conditioner is given primarily by the budget allocated for it.	<p>Shuning uchun, qaysi konditsionerni tanlash yaxshiroq ekanligini o&#39;ylab, quyidagilarga rahbarlik qiling:</p>\r\n\r\n<p>xona turi (uning hajmi, har xil ob-havo sharoitida o&#39;rtacha harorat, qoralamalarning mavjudligi va boshqalar). Bunday holda, tizimning qaerda joylashganligi, kerakli harorat havosi xonada etarlicha taqsimlanishi mumkinligini hisobga olish kerak;</p>\r\n\r\n<p>taxminiy foydalanish chastotasi (agar bu mavsumiy xarid bo&#39;lsa, issiqdan qochish uchun siz arzonroq va kuchli modellarni olishingiz mumkin);</p>\r\n\r\n<p>qo&#39;shimcha funktsiyalar mavjudligi (boshqaruv paneli, taymer, havo oqimi yo&#39;nalishini sozlash va boshqalar)</p>\r\n\r\n<p>Agar siz to&#39;g&#39;ri konditsionerni qanday tanlashni bilishingizga shubha qilsangiz, xonaning xususiyatlarini bilsangiz, har doim do&#39;konlarda maslahatchilar bilan tekshirishingiz mumkin. Uyingiz uchun konditsionerni tanlashda shovqin darajasi kabi xususiyatlarga e&#39;tibor bering - kichik jim xonalar uchun bu muhim rol o&#39;ynaydi, chunki sanoat tipidagi sovutish tizimi issiqdan ko&#39;ra ko&#39;proq noqulaylik tug&#39;dirishi mumkin.</p>	<p>Поэтому, думая о том, какой кондиционер лучше выбрать, ориентируйтесь на:<br />\r\n<br />\r\nтип помещения (его объем, средняя температура при разных погодных условиях, наличие сквозняков и т.д.). При этом следует учитывать и то, где будет размещена система, сможет ли воздух нужной температуры адекватно распределяться в помещении;<br />\r\n<br />\r\nпредполагаемую частоту использования (если это покупка сезонная, чтобы спасться от жары, можно брать менее дорогие и мощные модели);<br />\r\n<br />\r\nналичие дополнительных функций (пульт управления, таймер, регулировка направления потока воздуха и т.д.<br />\r\n<br />\r\nЕсли вы сомневаетесь, что знаете, как правильно выбрать кондиционер, вы всегда можете уточнить у консультантов в магазинах, если будете знать характеристики помещения. Выбирая кондиционер для дома, обратите внимание и на такую характеристику как уровень шума - для небольших тихих помещений она играет важную роль, поскольку охлаждающая система промышленного типа может создавать больший дискомфорт, нежели жара.</p>	<p>Therefore, when thinking about which air conditioner is better to choose, be guided by:</p>\r\n\r\n<p>type of room (its volume, average temperature under different weather conditions, the presence of drafts, etc.). In this case, it should also be taken into account where the system will be located, whether the air of the required temperature can be adequately distributed in the room;</p>\r\n\r\n<p>the estimated frequency of use (if this is a seasonal purchase, in order to escape from the heat, you can take less expensive and powerful models);</p>\r\n\r\n<p>availability of additional functions (control panel, timer, air flow direction adjustment, etc.)</p>\r\n\r\n<p>If you doubt that you know how to choose the right air conditioner, you can always check with the consultants in the stores if you know the characteristics of the room. When choosing an air conditioner for your home, pay attention to such a characteristic as the noise level - for small quiet rooms it plays an important role, since an industrial-type cooling system can create more discomfort than heat.</p>	8	3	FW4Rt08Z9SAybTCfE5Y6dl8Gy8eCiqn8034XEE57.jpg	1	1	2020-11-23 18:50:03	2020-11-25 14:43:09
2	Uyingiz uchun televizorni qanday tanlash mumkin?	Как выбрать телевизор для дома ?	How to choose a TV for your home?	Odatda, odamlar faqat bir necha yil ichida yangi televizor sotib olish haqida o'ylashadi. Aksariyat odamlar yangi texnologiyalarni rivojlantirishga qodir emasligi ajablanarli emas.	Обычно люди задумываются о покупке нового телевизора лишь раз в несколько лет. Неудивительно, что большинство не успевает уследить за развитием новых технологий.	Usually, people think about buying a new TV only once every few years. Unsurprisingly, most do not keep up with the development of new technologies.	<p>Zamonaviy televizorlarda tasvirni uzatish texnologiyasi: nimani tanlash kerak?</p>\r\n\r\n<p>Avvaliga CRT va plazma televizorlar allaqachon eskirgan deb hisoblanadi - birinchisi asta-sekin muzey ashyolari toifasiga kiradi, ikkinchisi esa kam talabga ega va deyarli ishlab chiqarilmaydi. Ularning o&#39;rnini tasvirni uzatishning yangi texnologiyalari - LED va OLED egalladi. LED (yorug&#39;lik chiqaradigan diyot uchun qisqacha) suyuq kristalli panellar bo&#39;lib, bozorning taxminan 90 foizini tashkil etadi. LED displeylari yorqin va boy ranglarni ta&#39;minlaydi, bunday panellar bilan jihozlangan televizorlar ingichka va engil (bu televizorni devorga o&#39;rnatishni rejalashtirsangiz, ayniqsa muhimdir), modellarni tanlash juda katta. Ammo LED ekranlarining kamchiliklari ham bor. Avvalo, kamchiliklarga kichik ko&#39;rish burchagi (agar ekranni yon tomondan qarasangiz, rasm porlaydi) va past kontrast kiradi.</p>\r\n\r\n<p>OLED televizorlari (Organik yorug&#39;lik chiqaradigan diodning qisqartmasi) - bu keyingi avlod. OLED yoki organik yorug&#39;lik chiqaradigan diodli (OLED) monitorlar LED monitorlaridan ham ingichka, ular keng ko&#39;rish burchagi va yuqori kontrastga ega. Biroq, bunday televizorlar har kimga mos kelmasa-da, ular juda qimmatga ega va asosan diagonali katta televizorlar namoyish etiladi.</p>\r\n\r\n<p>Qaror qanday bo&#39;lishi kerak?</p>\r\n\r\n<p>Ruxsat berish - bu birlik maydoniga to&#39;g&#39;ri keladigan piksellar soni. Ruxsat qanchalik baland bo&#39;lsa, rasm shunchalik batafsilroq bo&#39;ladi. Deyarli barcha zamonaviy televizorlar ikkita asosiy formatdan birini qo&#39;llab-quvvatlaydi - HD Ready yoki Full HD. Biroq, yaqinda qimmatbaho yangi mahsulot paydo bo&#39;ldi - Ultra HD 4K.</p>\r\n\r\n<p>HD Ready 1280 x 720 ppi ni, Full HD esa 1920 x 1080 ni tashkil qiladi. Full HD-ning yaxshiroq ekanligi aniq, ammo buni ekran yetarli darajada katta bo&#39;lgan taqdirdagina - 32 dyuymgacha diagonali bilan ikkala format ham bir xil ko&#39;rinishga ega bo&#39;lsa, buni baholash mumkin, ammo agar siz katta televizorni xohlasangiz, unda Full HD-ni tanlang.</p>\r\n\r\n<p>Ultra HD (4K) - bu butunlay yangi format. Uning o&#39;lchamlari 3840 &times; 2160 dpi ni tashkil qiladi. Ushbu televizorlar juda katta ekranlarda ham juda aniq tasvirlarni taqdim etadi. Ammo bitta muammo bor - bunday yuqori aniqlikdagi tarkib hali juda oz. Shuning uchun sizga odatda sifatli, sifatli dasturlarda ko&#39;rsatuvlar, filmlar va teledasturlarni tomosha qilishingiz kerak bo&#39;ladi. Shu bilan birga, yaqinda Ultra HD uchun juda ko&#39;p kontent paydo bo&#39;lishiga shubha yo&#39;q.</p>\r\n\r\n<p>Qo&#39;llab-quvvatlanadigan video formatlari</p>\r\n\r\n<p>HDR, High Dynamic Range, yuqori Dinamik Range degan ma&#39;noni anglatadi. HDR televizorlarning yorqinligi va kontrasti yuqori. Ular aslida biz ko&#39;rgan narsaga imkon qadar yaqinroq tasvirni beradi - rasm hajmi va chuqurligiga ega.</p>\r\n\r\n<p>Keling, 3D televizorlarni eslaylik. Ular uch o&#39;lchamli tasvirni ko&#39;paytirishga qodir. To&#39;g&#39;ri, filmlarda bo&#39;lgani kabi, sizga maxsus ko&#39;zoynak taqishga to&#39;g&#39;ri keladi. Aytishim kerakki, 3D funktsiyasi ommaviy muxlis topa olmadi va u erda ham 3D tarkib unchalik ko&#39;p emas.</p>\r\n\r\n<p>Ovoz sifati</p>\r\n\r\n<p>Shubhasiz, televizordagi asosiy narsa ovoz emas, balki tasvirdir. Yupqa va ixcham televizorlar, ta&#39;rifga ko&#39;ra, biz yuqori darajadagi dinamik tizimdan kutgan tovush sifatini ta&#39;minlay olmaymiz - shunchaki ularning kabinetida unga joy yo&#39;q. Shunga qaramay, zamonaviy televizorlar bunga intilishadi va ba&#39;zi modellarda ovoz juda yaxshi. Agar siz yuqori sifatli ovozli televizor sotib olmoqchi bo&#39;lsangiz, o&#39;rnatilgan subwoofer, 20W va Dolby Digital-dan stereo karnaylarga ega modelni izlang.</p>\r\n\r\n<p>Energiya sarfi</p>\r\n\r\n<p>LCD televizorlarining quvvat sarfi diagonalga bog&#39;liq - diagonali qanchalik katta bo&#39;lsa, quvvat sarfi shuncha ko&#39;p bo&#39;ladi. O&#39;rtacha zamonaviy LED televizor soatiga 40-300 vatt iste&#39;mol qiladi. OLED monitorlari ancha tejamkor. Quvvatni tejash rejimi va yorug&#39;likni aqlli boshqarish ham pulingizni tejashga yordam beradi.</p>\r\n\r\n<p>Funktsional</p>\r\n\r\n<p>Televizor uzoq vaqtdan beri televizion dasturlarni tomosha qilish uchun monitor bo&#39;lishni to&#39;xtatdi. Har yili televizorlar yanada murakkablashib, qo&#39;shimcha funktsiyalar bilan ko&#39;payib bormoqda. Eng ko&#39;p e&#39;tiborni tortadigan yangilik - bu Smart TV. Smart TV-lar oddiy televizorlardan smartfonlarning oddiy telefonlardan farqi bilan farq qiladi. Aqlli televizorlar yordamida o&#39;rnatilgan brauzer orqali Internetga kirish, video tomosha qilish, ijtimoiy tarmoqlarda suhbatlashish, dasturlar va o&#39;yinlarni yuklab olish mumkin. Smartfonlar singari, aqlli televizorlar ham turli xil platformalarda ishlaydi, ammo ko&#39;plab foydalanuvchilar Android platformasi bilan tanishishni afzal ko&#39;rishadi.</p>\r\n\r\n<p>Interfeyslar</p>\r\n\r\n<p>Bu juda muhim xususiyat. Bu turli xil tashqi vositalarni ulash uchun portlarning mavjudligini nazarda tutadi. Zamonaviy televizor qanday portlarga ega bo&#39;lishi kerak? Avvalo, USB port - bu USB stiklarni, smartfonlarni, tashqi qattiq disklarni, kameralarni va boshqalarni televizorga ulash imkonini beradi HDMI shuningdek, noutbuk yoki kompyuterni, o&#39;yin konsolini, video qabul qiluvchini ulash uchun kerak. Agar siz televizoringizni multimediya ko&#39;ngilochar markazi sifatida ishlatmoqchi bo&#39;lsangiz, ko&#39;p sonli HDMI portlari bo&#39;lgan modellarni tanlang - shu bilan bir vaqtning o&#39;zida bir nechta asboblarni ulashingiz mumkin. LAN - tarmoq kabeli uchun port</p>	<p><strong>Технология передачи изображения в современных телевизорах: что выбрать ?</strong><br />\r\n<br />\r\nНачнем с того, что ЭЛТ-телевизоры и телевизоры с плазменными экранами уже считаются устаревшими &mdash; первые постепенно перемещаются в разряд музейных артефактов, а вторые пользуются все меньшим спросом и уже почти не производятся. Их вытеснили новые технологии передачи изображения &mdash; LED и OLED. LED (сокращение от англ. Light-emitting diode &mdash; светодиод) &mdash; это жидкокристаллические панели, на их долю приходится около 90% рынка. LED-экраны обеспечивают яркие и насыщенные цвета, телевизоры, оснащенные такими панелями, тонкие и легкие (это особенно важно, если вы планируете закрепить телевизор на стене), выбор моделей огромен. Но у LED-экранов есть и минусы. В первую очередь, к недостаткам относят небольшой угол обзора (если посмотреть на экран сбоку, изображение бликует) и невысокую контрастность.<br />\r\n<br />\r\nOLED -телевизоры (сокращение от англ. Organic Light-emitting diode &mdash; органический светодиод ) &mdash; это следующее поколение. OLED, или мониторы на органических светодиодах, еще тоньше LED-мониторов, у них широкий угол обзора и высокая контрастность. Однако пока такие телевизоры по карману не всем &mdash; они стоят достаточно дорого, а модельный ряд в основном представлен телевизорами с большой диагональю.<br />\r\n<br />\r\n<strong>Каким должно быть разрешение ?</strong><br />\r\n<br />\r\nРазрешение &mdash; это количество пикселей на единицу площади. Чем разрешение больше, тем более детализированной будет картинка. Практически все современные телевизоры поддерживают один из двух главных форматов &mdash; НD Ready или Full HD . Однако недавно появилась и дорогостоящая новинка &mdash; Ultra HD 4К .<br />\r\n<br />\r\nНD Ready предполагает 1280&times;720 пикселей на дюйм, а Full HD &mdash; 1920&times;1080. Понятно, что Full HD лучше, однако оценить это можно только в том случае, если экран достаточно большой &mdash; при диагонали до 32 дюймов оба формата будут смотреться примерно одинаково, а вот если вы хотите большой телевизор, то выбирайте Full HD.<br />\r\n<br />\r\nUltra HD (4К) &mdash; совершенно новый формат. Он предполагает разрешение 3840&times;2160 точек на дюйм. Такие телевизоры дают сверхчеткое изображение даже на очень больших экранах. Но есть одна проблема &mdash; контента такого высокого разрешения пока очень мало. Так что вам придется смотреть в основном программы, фильмы и сериалы в обычном качестве. При этом несомненно, что в скором времени контента для Ultra HD будет гораздо больше.<br />\r\n<br />\r\n<strong>Поддерживаемые форматы видео</strong><br />\r\n<br />\r\nHDR, High Dynamic Range, расшифровывается как расширенный динамический диапазон. Телевизоры, поддерживающие HDR, отличаются большей яркостью и контрастностью. Они дают изображение, максимально приближенное к тому, что мы видим в реальности &mdash; картинка обладает объемом и глубиной.<br />\r\n<br />\r\nВспомним и про 3D-телевизоры. Они способны воспроизводить объемное изображение. Правда, как и в кино, придется надевать специальные очки. Надо сказать, что функция 3D не нашла массового поклонника, да и 3D-контента не так уж много.<br />\r\n<br />\r\n<strong>Качество звука</strong><br />\r\n<br />\r\nОчевидно, что главное в телевизоре именно изображение, а не звучание. Тонкие и компактные телевизоры по определению не могут обеспечить такое же качество звука, какого мы ожидаем от высококлассной акустической системы &mdash; в их корпусе просто нет для нее места. Тем не менее современные телевизоры стремятся к этому и звук в некоторых моделях действительно очень хорош. Если вы хотите купить телевизор с качественным звуком, ищите модель со встроенным сабвуфером, стереоколонками мощностью от 20 Вт и системой Dolby Digital.<br />\r\n<br />\r\n<strong>Энергопотребление</strong><br />\r\n<br />\r\nЭнергопотребление ЖК-телевизоров зависит от диагонали &mdash; чем она больше, тем выше энергопотребление. В среднем современный LED-телевизор потребляет 40&ndash;300 Вт в час. OLED-мониторы экономичнее. Сэкономить ваши деньги поможет также режим энергосбережения и интеллектуального управления подсветкой.<br />\r\n<br />\r\n<strong>Функционал</strong><br />\r\n<br />\r\nТелевизор давно перестал быть просто монитором для просмотра ТВ-программ. С каждым годом телевизоры становятся все сложнее и обрастают дополнительными функциями. Новинка, привлекающая наибольшее внимание &mdash; Smart TV . Смарт-телевизоры отличаются от обычных так же, как смартфоны отличаются от обычных телефонов. С помощью умных телевизоров можно выходить в интернет через встроенный браузер, смотреть видео, общаться в социальных сетях, скачивать приложения и игры. Как и смартфоны, смарт-телевизоры работают на разных платформах, однако многие пользователи предпочитают иметь дело с платформой Android, знакомой по смартфонам.<br />\r\n<br />\r\n<strong>Интерфейсы</strong><br />\r\n<br />\r\nЭто очень важная характеристика. Она подразумевает наличие портов для подключения различных внешних носителей. Какие порты должны быть в современном телевизоре? Прежде всего, USB -порт &mdash; он позволяет подключать к телевизору флешки, смартфоны, внешние жесткие диски, фотоаппараты и пр. Необходим и HDMI для подключения ноутбука или компьютера, игровой приставки, видеоресивера. Если вы планируете использовать телевизор как мультимедийный развлекательный центр, выбирайте модели с большим количеством HDMI-портов &mdash; так вы сможете подключить несколько гаджетов одновременно. LAN &mdash; порт для сетевого кабеля, используется для подключения интернета. Он необходим, если телевизор не поддерживает Wi-Fi . AV-порт нужен для подключения звукового оборудования.</p>	<p>Image transmission technology in modern TVs: what to choose?</p>\r\n\r\n<p>To begin with, CRT and plasma TVs are already considered obsolete - the former are gradually moving into the category of museum artifacts, and the latter are in less demand and are almost never produced. They were replaced by new image transmission technologies - LED and OLED. LED (short for Light-emitting diode - light-emitting diode) are liquid crystal panels, accounting for about 90% of the market. LED screens provide bright and rich colors, TVs equipped with such panels are thin and light (this is especially important if you plan to mount the TV on the wall), the choice of models is huge. But LED screens also have disadvantages. First of all, the disadvantages include a small viewing angle (if you look at the screen from the side, the image glares) and low contrast.</p>\r\n\r\n<p>OLED TVs (short for Organic Light-emitting diode) are the next generation. OLED, or organic light-emitting diode (OLED) monitors, are even thinner than LED monitors, they have a wide viewing angle and high contrast. However, while such TVs are not affordable for everyone - they are quite expensive, and the lineup is mainly represented by TVs with a large diagonal.</p>\r\n\r\n<p>What should be the resolution?</p>\r\n\r\n<p>Resolution is the number of pixels per unit area. The higher the resolution, the more detailed the picture will be. Almost all modern TVs support one of the two main formats - HD Ready or Full HD. However, an expensive new product has recently appeared - Ultra HD 4K.</p>\r\n\r\n<p>HD Ready assumes 1280 x 720 ppi, and Full HD assumes 1920 x 1080. It is clear that Full HD is better, but this can be appreciated only if the screen is large enough - with a diagonal of up to 32 inches, both formats will look about the same, but if you want a large TV, then choose Full HD.</p>\r\n\r\n<p>Ultra HD (4K) is a completely new format. It assumes a resolution of 3840x2160 dpi. These TVs provide ultra-clear images even on very large screens. But there is one problem - there is very little content of such high resolution so far. So you will have to watch mostly programs, movies and TV shows in normal quality. At the same time, there is no doubt that soon there will be much more content for Ultra HD.</p>\r\n\r\n<p>Supported video formats</p>\r\n\r\n<p>HDR, High Dynamic Range, stands for High Dynamic Range. HDR TVs have higher brightness and contrast. They give an image as close as possible to what we see in reality - the picture has volume and depth.</p>\r\n\r\n<p>Let&#39;s remember about 3D TVs. They are able to reproduce a three-dimensional image. True, as in the movies, you will have to wear special glasses. I must say that the 3D function did not find a mass fan, and there is not so much 3D content either.</p>\r\n\r\n<p>Sound quality</p>\r\n\r\n<p>Obviously, the main thing in the TV is the image, not the sound. Thin and compact TVs, by definition, cannot provide the sound quality we expect from a high-end speaker system - there is simply no room for it in their cabinet. Nevertheless, modern TVs strive for this and the sound in some models is really very good. If you want to buy a TV with high quality sound, look for a model with a built-in subwoofer, stereo speakers from 20W and Dolby Digital.</p>\r\n\r\n<p>Energy consumption</p>\r\n\r\n<p>The power consumption of LCD TVs depends on the diagonal - the larger it is, the higher the power consumption. On average, a modern LED TV consumes 40-300 watts per hour. OLED monitors are more economical. Power saving mode and intelligent backlight control also help save you money.</p>\r\n\r\n<p>Functional</p>\r\n\r\n<p>The TV has long ceased to be just a monitor for watching TV programs. Every year TVs are becoming more complex and overgrown with additional functions. The novelty that attracts the most attention is Smart TV. Smart TVs differ from regular TVs in the same way that smartphones differ from regular phones. With the help of smart TVs, you can access the Internet through the built-in browser, watch videos, communicate on social networks, download applications and games. Like smartphones, smart TVs run on different platforms, however many users prefer to deal with the Android platform familiar from smartphones.</p>\r\n\r\n<p>Interfaces</p>\r\n\r\n<p>This is a very important characteristic. It implies the presence of ports for connecting various external media. What ports should a modern TV have? First of all, a USB port - it allows you to connect USB sticks, smartphones, external hard drives, cameras, etc. to the TV. HDMI is also needed to connect a laptop or computer, a game console, a video receiver. If you plan to use your TV as a multimedia entertainment center, choose models with a large number of HDMI ports so you can connect several gadgets at the same time. LAN - port for a network cable, is</p>	2	3	eL8lDIzY1yofAe4XppuhHbTKtoCLtWtd0eED385M.jpg	1	1	2020-11-23 11:59:17	2020-11-25 14:43:55
7	Onlayn do'kon konvertatsiyasini qanday oshirish mumkin: onlayn to'lov shakllarini optimallashtirish	Как повысить конверсию интернет-магазина: оптимизация форм онлайн-оплаты	How to increase the conversion of an online store: optimization of online payment forms	Saytda sotib olish uchun pul to'lash - onlayn xaridlarning yakuniy bosqichi, ammo ahamiyati jihatidan bu eng muhimlaridan biri.	Оплата покупки на сайте – это завершающий этап онлайн-шоппинга, но по значимости он один из самых важных.	Paying for a purchase on the site is the final stage of online shopping, but in terms of importance it is one of the most important.	<p>Onlayn xaridni amalga oshirish uchun, bir kishi bir nechta rasmiy rasmiyatchiliklarni bajarishi kerak, masalan, onlayn buyurtma shaklini to&#39;ldirish. Agar sizning saytingiz statistikasi shuni ko&#39;rsatadiki, to&#39;lovning ushbu bosqichida mijozingizni yo&#39;qotib qo&#39;ysangiz, u holda Internet-ekviringni ta&#39;minlovchi xizmat o&#39;z vazifasini bajarmayapti. Bunday xizmatlarning maqsadi nafaqat mijozning hisob raqamiga pul o&#39;tkazish, balki qulay foydalanuvchi tajribasini ta&#39;minlashdir. Bunga erishish uchun siz onlayn to&#39;lov shakllaridan foydalanish (foydalanish qulayligi) ustida ishlashingiz kerak.</p>	<p>Чтобы совершить покупку в Интернете, человек должен выполнить несколько формальностей, например, заполнить форму онлайн-заказа. Если статистика вашего сайта говорит о том, что вы теряете покупателя именно на этом этапе &ndash; оплаты, значит сервис, который обеспечивает интернет-эквайринг, не справляется со своими задачами. Цель таких сервисов &ndash; не просто переправлять деньги на счёт клиенту, а обеспечивать комфортный пользовательский опыт. Чтобы этого достичь, нужно поработать над юзабилити (удобством пользования) форм онлайн-оплаты.</p>	<p>To make a purchase online, a person must complete several formalities, such as completing an online order form. If the statistics of your site suggests that you are losing a customer at this stage of payment, then the service that provides Internet acquiring is not doing its job. The purpose of such services is not just to transfer money to the client&#39;s account, but to provide a comfortable user experience. To achieve this, you need to work on the usability (ease of use) of online payment forms.</p>	11	3	R6Hmb5zOxAJD7dCaeA0UjzjosBz9LbjzVQhku0P7.jpg	1	1	2020-11-23 19:10:25	2020-11-25 14:45:25
6	To'g'ri changyutgichni qanday tanlash mumkin?	Как правильно выбрать пылесос ?	How to choose the right vacuum cleaner?	Eski changyutgichingiz ishdan chiqqan va siz yangisini sotib olishga qaror qildingiz	Ваш старый пылесос вышел из строя, и вы решили купить новый	Your old vacuum cleaner is out of order and you decide to buy a new one	<p><strong>Eski changyutgichingiz ishdan chiqqan va siz yangisini sotib olishga qaror qildingiz</strong></p>\r\n\r\n<p><strong>Ammo do&#39;konga kirib, ular uy yordamchisini tanlashning asosiy mezonlarini bilmasliklarini angladilar. Dizayn farqlari bilan tartibda boshlaylik. Chang yutgichlar 6 guruhga bo&#39;linadi: avtomobil, akkumulyator, chang yig&#39;uvchi va chang yig&#39;ish uchun sumkasiz, suv filtri va yuvinish bilan.</strong></p>\r\n\r\n<p><strong>Avtoulovdan boshlaymiz. Nomidan ko&#39;rinib turibdiki, ushbu changyutgich avtoulovlarni tozalash uchun mo&#39;ljallangan va odatda sigaret zajigalka bilan ishlaydi. Batareya bilan jihozlangan changyutgichlar rozetkadan quvvat oladilar va shuningdek, odatda, avtomobilni tozalash uchun mo&#39;ljallangan.</strong></p>\r\n\r\n<p><strong>Agar siz uy uchun changyutgich sotib olishga kelgan bo&#39;lsangiz, unda bu biz keyinroq ko&#39;rib chiqadigan modellarga tegishli. Avval texnik xususiyatlarni ko&#39;rib chiqamiz.</strong></p>\r\n\r\n<p><strong>Elektr supurgisining asosiy sifat xususiyati kuchdir. U iste&#39;mol va assimilyatsiya kuchiga bo&#39;linadi. Quvvat sarfini hisobga olish muhim, ammo siz ichki ish uchun 350 vattdan past bo&#39;lmasligi kerak bo&#39;lgan assimilyatsiya quvvati bilan qiziqasiz. Ba&#39;zan shunday bo&#39;ladiki, bitta ishlab chiqaruvchining ikkita changyutgichini taqqoslashda birinchi qarashda tushunarsiz bo&#39;lgan farqlar seziladi: bitta changyutgichning iste&#39;mol quvvati katta bo&#39;lishi mumkin, uning tortish quvvati ikkinchisiga qaraganda kamroq. Bu changni yig&#39;ish texnologiyalari va filtr dizaynidagi farqlarga bog&#39;liq.</strong></p>\r\n\r\n<p><strong>Iste&#39;molchi nuqtai nazaridan eng muhimlari quyidagi parametrlardir:</strong></p>\r\n\r\n<p><strong>Shlangi quvvati.<br />\r\nFiltrni dizayni.<br />\r\nToz yig&#39;ish uchun sumka yoki idishning hajmi.<br />\r\nIpning uzunligi, tercihen olti metrga yaqin bo&#39;lishi kerak.<br />\r\nShovqin darajasi. Bu kuchga bog&#39;liq emas, shuning uchun jimroq changyutgichni tanlang.<br />\r\nNoziklarning soni va dizayni. Qancha ko&#39;p bo&#39;lsa, shuncha yaxshi bo&#39;ladi.<br />\r\nXizmatning kafolat muddati.</strong></p>	<p><strong>Ваш старый пылесос вышел из строя, и вы решили купить новый</strong><br />\r\n<br />\r\nНо зайдя в магазин, поняли, что не знаете основных критериев выбора домашнего помощника. Давайте начнем по порядку, с конструктивных различий. Пылесосы относят к 6 группам: автомобильные, аккумуляторные, с пылесборником и без мешка для сбора пыли, с водяным фильтром и моющие.<br />\r\n<br />\r\nНачнем с автомобильного. Судя по названию, этот пылесос предназначен для уборки автомобилей и, как правило, работает от прикуривателя. Пылесосы, снабженные аккумулятором, заряжаются от розетки и тоже созданы, как правило, для чистки авто.<br />\r\n<br />\r\nЕсли вы пришли покупать пылесос для дома, то он относится к моделям, которые рассмотрим позже. Сначала рассмотрим технические характеристики.<br />\r\n<br />\r\nГлавная качественная характеристика пылесоса &ndash; мощность. Она делится на потребляемую и мощность всасывания. Учитывать потребляемую мощность важно, но для вас представляет интерес мощность всасывания, которая для работы в помещениях не должна быть ниже 350 Вт. Иногда бывает, что при сравнении двух пылесосов одного производителя заметны непонятные на первый взгляд отличия: мощность потребления одного пылесоса может быть больше, в то время, как его же мощность всасывания &ndash; меньше, чем у второго. Это объясняется различиями в технологиях сбора пыли и конструкциях фильтров.<br />\r\n<br />\r\n<strong>Наиболее значимы с точки зрения потребителя, следующие параметры:</strong><br />\r\n<br />\r\nМощность всасывания.<br />\r\nКонструкция фильтра.<br />\r\nОбъем мешка или емкости для сбора пыли.<br />\r\nДлина шнура, которая, желательно, должна приближаться к шести метрам.<br />\r\nУровень шума. Он не зависит от мощности, поэтому выбирайте более &laquo;тихий&raquo; пылесос.<br />\r\nКоличество и конструкция насадок. Чем их больше, тем лучше.<br />\r\nГарантийный срок обслуживания.</p>	<p>Your old vacuum cleaner is out of order and you decide to buy a new one</p>\r\n\r\n<p>But having entered the store, they realized that they did not know the main criteria for choosing a home assistant. Let&#39;s start in order with the design differences. Vacuum cleaners belong to 6 groups: automobile, battery, with a dust collector and without a bag for collecting dust, with a water filter and washing.</p>\r\n\r\n<p>Let&#39;s start with the automobile. As the name suggests, this vacuum cleaner is designed for cleaning cars and is usually powered by a cigarette lighter. Vacuum cleaners equipped with a battery are charged from an outlet and are also designed, as a rule, for cleaning a car.</p>\r\n\r\n<p>If you came to buy a vacuum cleaner for the house, then it belongs to the models that we will consider later. Let&#39;s look at the technical specifications first.</p>\r\n\r\n<p>The main quality characteristic of a vacuum cleaner is power. It is divided into consumption and suction power. It is important to consider the power consumption, but you are interested in the suction power, which should not be lower than 350 watts for indoor operation. Sometimes it happens that when comparing two vacuum cleaners of the same manufacturer, differences that are incomprehensible at first glance are noticeable: the consumption power of one vacuum cleaner may be greater, while its suction power is less than that of the second. This is due to differences in dust collection technologies and filter designs.</p>\r\n\r\n<p>The most significant from the point of view of the consumer are the following parameters:</p>\r\n\r\n<p>Suction power.<br />\r\nFilter design.<br />\r\nThe volume of the bag or container for collecting dust.<br />\r\nThe length of the cord, which, preferably, should be close to six meters.<br />\r\nNoise level. It does not depend on power, so choose a quieter vacuum cleaner.<br />\r\nThe number and design of nozzles. The more, the better.<br />\r\nService warranty period.</p>	10	3	D519a8ROdzlTelryAQkdWPQdtuf8R39R02hWKpuM.jpg	1	1	2020-11-23 18:57:20	2020-11-25 14:47:54
9	Bizning Blenderni sotib olish bo'yicha muhim qo'llanma	Наше основное руководство по покупке Blender	Our Essential Blender Buying Guide	Maydalagichlar maydalashdan va aralashtirishdan va tozalashdan tortib, bularning barchasini bajara olishadi. To'g'ri tanlash uchun blenderni sotib olish bo'yicha qo'llanmamizdan foydalaning!	Блендеры могут все: от измельчения и измельчения до смешивания и пюрирования. Воспользуйтесь нашим руководством по покупке блендера, чтобы выбрать подходящий!	From chopping and crushing to mixing and puréeing, blenders can do it all. Use our blender buying guide to choose the right one!	<p>Oshxona uchun asbob sotib olish, ayniqsa, tez-tez aralashtirgich kabi ishlatiladigan bu uy oshpaziga juda mos keladi. Bu aralashtirgichlarning hajmi, tezligi va kuchini o&#39;z ichiga olgan deyarli barcha toifalarda keng farq qilishi mumkinligiga yordam bermaydi. Pina-koladalar ishlab chiqaradigan oddiy dastgohdan tortib to yuqori darajadagi blendergacha ularning narxi 30 dan 600 dollargacha. Xarid qilishdan oldin, sizni to&#39;g&#39;ri yo&#39;nalishga yo&#39;naltirish uchun blenderni sotib olish bo&#39;yicha qo&#39;llanmamizdan foydalaning.</p>\r\n\r\n<p>Avval o&#39;lchamini ko&#39;rib chiqing<br />\r\nKarıştırıcılar hajmi 3 dan 14 stakangacha farq qilishi mumkin. To&#39;g&#39;ri birini tanlash muhimdir. Agar saqlash joyi tashvishga soladigan bo&#39;lsa, ixcham, bitta xizmatga mo&#39;ljallangan blenderni tanlash yaxshi fikr bo&#39;lishi mumkin. Oldindan ovqat tayyorlashni yaxshi ko&#39;radigan yoki ko&#39;pincha oila a&#39;zolari yoki do&#39;stlari uchun ovqat pishiradigan har bir kishi uchun kattaroq hajmga ko&#39;tarish yaxshi fikr bo&#39;lishi mumkin.</p>	<p>Покупка прибора для кухни, особенно такого, которым пользуются так же часто, как блендер, - большой шаг для домашнего повара. Не помогает то, что блендеры могут сильно различаться почти во всех категориях, включая размер, скорость и силу. От простой машины для приготовления пинья-колады до высококлассного блендера, они даже варьируются по цене от 30 до более 600 долларов. Перед покупкой воспользуйтесь нашим руководством по покупке блендера, которое укажет вам правильное направление.</p>\r\n\r\n<p>Сначала рассмотрите размер<br />\r\nБлендеры бывают разного размера от 3 до 14 чашек. Важно выбрать правильный. Если место для хранения беспокоит, было бы неплохо выбрать компактный одноразовый блендер. Для тех, кто любит готовить еду заранее - или часто готовит для группы семьи или друзей - может быть хорошей идеей перейти на более крупный.</p>	<p>Purchasing an appliance for the kitchen, especially one that gets used as often as a blender, is a big move for a home chef. It doesn&rsquo;t help that blenders can vary widely in almost every category, including size, speed and strength. From a simple machine to&nbsp;<a href="https://www.tasteofhome.com/recipes/pina-coladas/" rel="noopener">make pi&ntilde;a coladas</a>&nbsp;up to a high-end blender, they even range in price from $30 to well over $600. Before you shop, use our blender buying guide to point you in the right direction.</p>\r\n\r\n<h3><strong>Consider the Size First</strong></h3>\r\n\r\n<p>Blenders can vary in size from 3 to 14 cups. It&rsquo;s important to choose the right one. If storage space a concern, it might be a good idea to choose a compact, single-serve blender. For anyone who likes to meal prep in advance&mdash;or often cooks for a group of family or friends&mdash;it might be a good idea to upgrade to a larger size.</p>	22	3	nZ8RbrafRIfYys143WvnF9jKgzOyTL05Sc9a5qe3.jpg	1	1	2020-11-23 19:37:21	2020-11-25 14:48:55
10	Eng yaxshi kiyim do'konini tanlash bo'yicha maslahatlar	Советы по выбору лучшего магазина одежды	Tips for Choosing the Best Clothing Store	Kiyim - bu siz yashay olmaydigan asosiy ehtiyojlardan biri, shuning uchun odamlar kiyim sotib olishadi.	Одежда - одна из основных потребностей, без которой невозможно жить, и поэтому люди покупают одежду.	Clothing is one of the basic needs you cannot live without and that is why people purchase clothes.	<p>Agar siz kiyim-kechak chakana do&#39;konini ochishni xohlasangiz, butikni o&#39;rnatishdan oldin bilishingiz kerak bo&#39;lgan to&#39;g&#39;ri elementlarni bilishingizga ishonch hosil qiling. To&#39;g&#39;ri manbalar va ma&#39;lumotlar yordamida siz muvaffaqiyatli kiyim-kechak do&#39;konini boshlaysiz.<br />\r\nKiyinish uchun eng yaxshi kiyimni tanlash - bu eng to&#39;g&#39;ri qarorlardan biri. Biroq, to&#39;g&#39;ri kiyim do&#39;konini tanlash juda qiyin vazifa bo&#39;lishi mumkin, chunki juda ko&#39;p variantlar mavjud. Ammo quyidagilar sizga kiyim do&#39;konini to&#39;g&#39;ri tanlashda yordam beradigan ba&#39;zi muhim maslahatlar.</p>	<p>Если вы также заинтересованы в открытии розничного магазина одежды, убедитесь, что вы знаете правильные элементы, которые вам нужно знать, прежде чем открывать свой бутик. Обладая правильными ресурсами и информацией, вы в конечном итоге создадите успешный магазин розничной торговли одеждой.<br />\r\nВыбор лучшей одежды для ношения - одно из самых простых решений, которые вы можете принять. Однако выбор подходящего магазина одежды может оказаться сложной задачей, поскольку существует множество вариантов. Но вот несколько важных советов, которые помогут вам выбрать правильный магазин одежды.</p>	<p>If you are also interested in starting a clothing retail store, make sure that you know the right elements you need to know before setting up your boutique. With the right resources and information, you will end up starting a successful clothing retail store.<br />\r\nChoosing the best clothes to wear is one of the most straightforward decisions you can ever make. However, selecting the right clothing store might be a daunting task since there are a lot of options involved. But the following are some of the essential tips that will help you to choose the right clothing store.</p>	1	3	inWD4hCUAwhkfnnDscWGFQ6UT3sBpBREDWCpVDoY.jpg	1	1	2020-11-23 19:40:23	2020-11-25 13:26:48
11	Pitsa kostryulkalarining har xil turlari	Различные типы противней для пиццы	Different Types of Pizza Pans	Bugungi kunda pitssa butun mamlakat bo'ylab mashhurligi oshgani sababli ko'plab kafe, pitsereya, oziq-ovqat yuk mashinalarida, restoranlarda va barlarda xizmat qilmoqda.	Сегодня пицца подается по всей стране во многих кафе, пиццериях, фургонах с едой, ресторанах и барах из-за роста ее популярности.	Today, pizza is being served all over the country at many cafes, pizzerias, food trucks, restaurants, and bars due to the increase in its popularity.	<p>Pitsa panasining turli xil turlari<br />\r\nPishiriq turi va qalinligi nafaqat qobiq uslubiga ta&#39;sir qiladi, balki pizza po&#39;stlog&#39;i qanday bo&#39;lishida kastryulkaning yuzasi ham katta rol o&#39;ynaydi. Pitsa xamiri pizza pechida pishayotganda unga beriladigan havo oqimi va issiqlik tarqalishida panning yuzasi katta rol o&#39;ynaydi.</p>\r\n\r\n<p>Qattiq pizza kostryulkalari - bu kostryulkalar teshiklari yoki uchlari yo&#39;q va pitsaning eng keng tarqalgan turi hisoblanadi. Shu sababli, issiqlikning qattiq panadan o&#39;tishi uchun ko&#39;proq vaqt kerak bo&#39;ladi, natijada xamir po&#39;sti paydo bo&#39;ladi.<br />\r\nNibbedli pizza kostryulkalari - Nitsalari bo&#39;lgan pizza panasida pizza kastryulkasining yuzasida mayda pog&#39;onalar mavjud. Bu qobiq ostidagi umumiy havo oqimiga yordam beradi. Nibbed pizza panasi, shuningdek, pizza xamiri uchun pishirish vaqtini tezlashtiradi va qobig&#39;ini oddiy qattiq idishga qaraganda tiniq qiladi.<br />\r\nDelikli pizza kostryulkalari - bu pizza kostryulkalaridagi teshiklari bor va issiqlik to&#39;g&#39;ridan-to&#39;g&#39;ri er qobig&#39;iga urilib, qobig&#39;ini yanada aniqroq qiladi. Teshikli idish ham pishirish vaqtini ancha qisqartiradi.<br />\r\nSuper teshikli pizza kostryulkalari - super teshikli pizza panasi xuddi teshilgan pizza panasiga o&#39;xshaydi, lekin ko&#39;proq teshiklari bilan qobig&#39;iga ko&#39;proq havo tushishi uchun. Ushbu idish pishirish vaqtini yanada qisqartiradi va qobig&#39;ini boshqa idishlarga qaraganda ancha tiniq qiladi.</p>	<p>Различные виды стилей поверхности сковороды для пиццы<br />\r\nМало того, что тип и толщина сковороды влияют на стиль корочки, но и поверхность сковороды также играет большую роль в том, какой будет корочка для пиццы. Поверхность сковороды играет большую роль в потоке воздуха и распределении тепла, которое передается тесту для пиццы при его приготовлении в печи для пиццы.</p>\r\n\r\n<p>Твердые противни для пиццы - эти сковороды не имеют отверстий или перьев и являются наиболее распространенным типом противней для пиццы. Из-за этого требуется больше времени для передачи тепла через твердую сковороду, что приведет к образованию тестовой корочки.<br />\r\nФормы для пиццы с перьями - форма для пиццы с перьями имеет небольшие неровности на поверхности формы для пиццы. Это помогает с общим потоком воздуха под коркой. Противень для пиццы с кусочками также ускоряет время выпекания теста для пиццы и делает корку более хрустящей, чем на обычной твердой форме.<br />\r\nПерфорированные формы для пиццы - в этих формах для пиццы есть отверстия, которые позволяют теплу напрямую воздействовать на корку, делая ее более хрустящей. Перфорированный противень также значительно сокращает время выпечки.<br />\r\nСуперперфорированные формы для пиццы - суперперфорированные формы для пиццы похожи на перфорированные формы для пиццы, но с большими отверстиями, позволяющими большему количеству воздуха попадать на корку. Эта форма позволяет сократить время выпечки и сделать корочку более хрустящей по сравнению с другими формами.</p>	<h2>Different Kinds of Pizza Pan Surface Styles</h2>\r\n\r\n<p>Not only does the type of pan and the thickness have an impact on the style of the crust, but the pan surface also plays a big part in what the pizza crust will be like. The pan surface plays a big role in the amount of airflow and heat distribution that is given to the pizza dough as it cooks in the pizza oven.</p>\r\n\r\n<ul>\r\n\t<li><strong><a href="https://www.webstaurantstore.com/3255/pizza-pans.html?filter=pan-type:solid" target="_blank">Solid Pizza Pans</a></strong>&nbsp;- These pans have no holes or nibs and are the most common type of pizza pan. Because of this, it takes longer for the heat to transfer through the solid pan, which will result in a doughy crust.</li>\r\n\t<li><strong><a href="https://www.webstaurantstore.com/3255/pizza-pans.html?filter=pan-type:nibs" target="_blank">Nibbed Pizza Pans</a></strong>&nbsp;- A pizza pan with nibs has small bumps on the surface of the pizza pan. This helps with the overall airflow underneath the crust. A nibbed pizza pan also speeds up the baking time for pizza dough and makes the crust crispier than a normal solid pan.</li>\r\n\t<li><strong><a href="https://www.webstaurantstore.com/3255/pizza-pans.html?filter=pan-type:perforated" target="_blank">Perforated Pizza Pans</a></strong>&nbsp;- These pizza pans have holes in them and allow heat to hit the crust directly, making the crust crispier. A perforated pan also makes baking times much shorter.</li>\r\n\t<li><strong><a href="https://www.webstaurantstore.com/3255/pizza-pans.html?filter=pan-type:super-perforated" target="_blank">Super Perforated Pizza Pans</a></strong>&nbsp;- A super perforated pizza pan is just like a perforated pizza pan, but with bigger holes to allow more air to hit the crust. This pan makes baking times even shorter and makes the crust much crispier than other pans.</li>\r\n</ul>	19	3	NSTt0QXPTj0OfgfiU8AeePbvXCaEQmZalcxxK5LK.jpg	1	1	2020-11-23 19:46:45	2020-11-25 14:50:33
5	Sovutgichingizni qanday qilib to'g'ri parvarish qilish kerak?	Как правильно ухаживать за холодильником ?	How to properly care for your refrigerator?	Sovutgichingizni qanday qilib to'g'ri parvarish qilish kerak	Как правильно ухаживать за холодильником	How to properly care for your refrigerator	<p>1 joy. Sovutgichni radiatorlar, isitgichlar, pechkalar va boshqa issiqlik manbalari yoniga qo&#39;ymaslik kerak. Uning shamollatiladigan joyda turishi va quyosh nurlariga tushmasligi maqsadga muvofiqdir. So&#39;nggi yillarda juda moda bo&#39;lib qolgan polni avtomatik isitish bu jihozga salbiy ta&#39;sir ko&#39;rsatmoqda. Agar siz jihozingizning ishlash muddatini uzaytirmoqchi bo&#39;lsangiz, yoki oshxonangizdagi yerdan isitishni o&#39;chirib qo&#39;ying yoki muzlatgich uchun polni isitish quvurisiz qoldiring.</p>\r\n\r\n<p>2. Ishni to&#39;g&#39;ri boshlash. Sovutgichni ishlatishdan oldin uni yuving. Uni bir necha soat davomida havoga chiqaring. Shundan so&#39;ng, uni ulang, lekin hech qanday ovqat qo&#39;ymang: avval muzlatgich muzlashi kerak. Kerakli darajadagi sovutishni kutib bo&#39;lgach, kerakli harorat rejimini o&#39;rnating va shundan keyingina unga ovqat qo&#39;ying.</p>\r\n\r\n<p>3. Xizmat. Har qanday maishiy texnika uchta sohada tozalanishi kerak: tashqarida, orqada va ichkarida. Moyli barmoq izlari ko&#39;pincha muzlatgichning tashqi qismida qoladi. Bu, ayniqsa, qalamlarga tegishli. Ushbu belgilarni muntazam ravishda shimgichni va pishirish soda eritmasi bilan yuvib tashlang. Qurilmani elektr tarmog&#39;idan uzishni unutmang! Tozalash uchun sovun va kimyoviy erituvchilardan foydalanish tavsiya etilmaydi.</p>\r\n\r\n<p>4. Noxush hidlardan xalos bo&#39;ling. Agar sizda NoFrost avtomatik tizimisiz byudjet modelingiz bo&#39;lsa, unda har 3 oyda bir marta uni muzdan tushirishingiz kerak. Muzni muloyimlik bilan sindirish mumkin, lekin kesish moslamalari bilan emas, balki maxsus spatula bilan. Kameralarning butun ichki yuzasini iliq suvga solingan shimgich bilan artib olish kerak, bu harorat tugmachasi va yoritish tizimiga tegmasdan.</p>	<p>1. Место. Холодильник нельзя ставить рядом с батареями, обогревателями, плитами и другими источниками тепла. Желательно, чтобы он стоял в проветриваемом помещении и на него не попадали солнечные лучи. Автоматический подогрев полов, ставший очень модным в последние годы, неблагоприятно сказывается на этом приборе. Если вы хотите продлить срок службы оборудования, либо отключите подогрев полов на кухне, либо оставьте участок пола для холодильника без труб подогрева.<br />\r\n<br />\r\n2. Правильное начало работы. Перед началом использования холодильника помойте его. Пусть он проветрится несколько часов. После этого включите его в розетку, но не закладывайте продукты: холодильник должен сначала заморозиться. Дождавшись необходимого уровня охлаждения, установите нужный режим температур и только тогда положите в него еду.<br />\r\n<br />\r\n3. Уход. Любую бытовую технику необходимо убирать в трех зонах: снаружи, сзади и внутри. На внешней поверхности холодильника часто остаются жирные следы от пальцев. Особенно это касается ручек. Регулярно отмывайте эти следы губкой, смоченной раствором соды. Только не забудьте отключить прибор от сети! Не рекомендуется использовать для очистки мыло и химические растворители.<br />\r\n<br />\r\n4. Избавляемся от запахов. Если у вас бюджетная модель без автоматической системы NoFrost, то раз в 3 месяца обязательно нужно ее разморозить. Лед можно аккуратно откалывать, но только не режущими предметами, а специальной лопаточкой. Всю внутреннюю поверхность камер необходимо протереть губкой, смоченной в теплой воде, не касаясь температурного переключателя и системы освещения.</p>	<p>1 place. The refrigerator should not be placed near radiators, heaters, stoves and other heat sources. It is advisable that he stands in a ventilated room and does not fall on the sun&#39;s rays. Automatic floor heating, which has become very fashionable in recent years, adversely affects this appliance. If you want to extend the life of your equipment, either turn off the underfloor heating in your kitchen, or leave the floor area for the refrigerator without heating pipes.</p>\r\n\r\n<p>2. Getting started right. Clean the refrigerator before using it. Let it air out for a few hours. After that, plug it in, but do not put any food: the refrigerator must first freeze. After waiting for the required level of cooling, set the desired temperature mode and only then put food in it.</p>\r\n\r\n<p>3. Care. Any household appliances must be cleaned in three areas: outside, back and inside. Oily fingerprints often remain on the outside of the refrigerator. This is especially true for pens. Regularly clean these marks off with a sponge and baking soda solution. Just don&#39;t forget to disconnect the device from the mains! It is not recommended to use soap and chemical solvents for cleaning.</p>\r\n\r\n<p>4. Get rid of odors. If you have a budget model without an automatic NoFrost system, then once every 3 months you must unfreeze it. Ice can be gently broken off, but not with cutting objects, but with a special spatula. The entire inner surface of the chambers must be wiped with a sponge dipped in warm water, without touching the temperature switch and the lighting system.</p>	21	3	rhXcGv8pjNB0pjMYJfXE4YMBOe1RI7DXdaqfU5RY.jpg	1	1	2020-11-23 18:53:20	2020-11-25 14:46:21
8	Kompyuterni qanday tanlash kerak	Как выбрать компьютер	How to choose a computer	Agar siz portativlikni talab qilsangiz, u holda noutbuk ("daftar" deb ham ataladi) shaxsiy kompyuteringiz sizga mos keladi.	Если вам нужна портативность, то портативный компьютер (также называемый «ноутбуком») для вас.	If you require portability, then a laptop (also referred to as a “notebook”) PC is for you.	<p>Agar sizning mavjud shaxsiy kompyuteringiz shunchalik sust bo&#39;lsa, u Windows Solitaire dasturini deyarli ishga tushirolmaydi, video tahrirlash kabi yanada qizg&#39;in narsa u yoqda tursin, xafa bo&#39;lmang. Muqarrar ravishda yangilanishga duch keladigan kompyuter foydalanuvchilari uchun bir nechta yaxshi yangilik bor: yangi kompyuter sotib olish uchun bundan oldin yaxshi vaqt bo&#39;lmagan.</p>\r\n\r\n<p>Narxlar eng past darajada, shu bilan birga kompyuterlar nihoyatda qudratli va qulay funktsiyalarga aylanmoqda. O&#39;zingizning ehtiyojlaringiz va byudjetingizga mos keladigan to&#39;g&#39;ri kompyuterni tanlash juda qiyin vazifa bo&#39;lishi mumkin - ayniqsa, geeky terminologiyasi va savdogar sotuvchilardan qo&#39;rqib ketgan uyatchan odamlar uchun.</p>	<p>Если ваш компьютер настолько медленный, что на нем с трудом запускается Windows Solitaire, не говоря уже о чем-то более сложном, например, редактировании видео, не волнуйтесь. Для пользователей компьютеров, столкнувшихся с неизбежным обновлением, есть хорошие новости: сейчас лучшее время для покупки нового ПК.</p>\r\n\r\n<p>Цены находятся на рекордно низком уровне, но в то же время компьютеры становятся невероятно мощными и полными удобных функций. Но выбор правильного компьютера в соответствии с вашими потребностями и бюджетом может оказаться непосильной задачей, особенно для тех, кто стесняется технических новинок, которых пугает заумная терминология и настойчивые продавцы.</p>	<p>If your existing PC is so slow it can barely run&nbsp;<em>Windows Solitaire</em>, let alone something more intense, like video editing, don&rsquo;t fret. There&rsquo;s some good news for computer users facing the inevitable upgrade: There&rsquo;s never been a better time to buy a new PC.</p>\r\n\r\n<p>Prices are at an all-time low, while at the same time, computers are becoming incredibly powerful and full of convenient features. But choosing the right computer to match your needs and budget can be an overwhelming task &mdash; especially for tech-shy folks intimidated by geeky terminology and pushy salespeople.</p>	14	3	m3LJBlB4hSBF8L5vegaCToM5vqQTpAuvPQNL3a9w.jpg	1	1	2020-11-23 19:34:14	2020-11-25 14:51:28
12	Sayohat uchun mukammal quvvat bankini qanday tanlash kerak (e'tiborga olish kerak bo'lgan omillar)	Как выбрать идеальный внешний аккумулятор для путешествий (факторы, которые следует учитывать)	How To Choose The Perfect Power Bank For Travel (Factors To Consider)	O'n yildan kamroq vaqt oldin jismoniy yo'riqnomalar g'azablanar edi, ko'p sayohatchilar energiya banklari (portativ akkumulyatorlar) bilan sayohat qilish haqida u yoqda tursin, hatto hech qachon eshitmagan edilar.	Менее десяти лет назад, когда в моде были физические путеводители, многие путешественники даже не слышали о пауэрбанках (портативных зарядных устройствах), не говоря уже о путешествиях с ними.	Less than a decade ago when physical guidebooks were all the rage, many travellers had never even heard of power banks (portable battery chargers) let alone travelled with one.	<p>Ammo hozirgi dunyoda elektron qo&#39;llanmalar jismoniy qo&#39;llanmalar o&#39;rnini bosa boshladi va ko&#39;plab sayohatchilar ushbu raqamli sayohat qo&#39;llanmalarini o&#39;zlarining smartfonlari va planshetlarida olib yurib, iste&#39;mol qilmoqdalar.<br />\r\nBu juda mantiqiy bo&#39;lgan yondashuv - elektron kitoblar vaznsiz va ularning qanchasini qurilmangizga yuklaganingizdan qat&#39;iy nazar, u og&#39;irlashmaydi.<br />\r\nSmartfonlar va planshetlar kabi qurilmalarning sayohat qilish uchun foydaliligi ularning sayohat uchun qulay foydalanish uchun raqamli qo&#39;llanmalarni olib yurish va namoyish qilish imkoniyatlaridan kattaroqdir.</p>\r\n\r\n<p>Sayohatchilar o&#39;zlarining smartfonlaridan quyidagilar uchun foydalanadilar:<br />\r\nturli xil navigatsiya dasturlari orqali shaharlar va shaharlar atrofida sayohat qilish, mehmonxonalar, transport markazlari, restoranlar, diqqatga sazovor joylar, attraktsionlar, bankomatlar, yoqilg&#39;i quyish shoxobchalari va boshqa mahalliy qulayliklarni topish.<br />\r\nularning to&#39;xtash joyi yoki temir yo&#39;l stantsiyasini o&#39;tkazib yubormasliklari uchun avtobuslarda yoki poezdlarda ularning joylashishini kuzatib boring</p>	<p>Но в современном мире электронные путеводители начали заменять физические путеводители, и многие путешественники носят и используют эти цифровые путеводители на своих смартфонах и планшетах.<br />\r\nТакой подход имеет много смысла - электронные книги невесомы, и сколько бы их ни загрузили на свое устройство, они не становятся тяжелее.<br />\r\nА полезность таких устройств, как смартфоны и планшеты, для путешествий выходит далеко за рамки их способности носить с собой и отображать цифровые путеводители для удобного использования в дороге.</p>\r\n\r\n<p>Путешественники также используют свои смартфоны, чтобы:<br />\r\nперемещаться по городам и городам и находить отели, транспортные узлы, рестораны, достопримечательности, аттракционы, банкоматы, заправочные станции и другие местные объекты с помощью различных навигационных приложений<br />\r\nотслеживать их местонахождение в автобусах или поездах, чтобы не пропустить автобусную остановку или вокзал</p>	<p>But in today&rsquo;s world, e-guidebooks have begun to replace physical guidebooks, and many travellers are carrying and consuming these digital travel guides on their smartphones and tablets.<br />\r\nIt&rsquo;s an approach that makes a lot of sense &ndash; e-books are weightless and no matter how many of them you load onto your device, it doesn&#39;t become any heavier.<br />\r\nAnd the usefulness of devices like smartphones and tablets for travel goes far beyond their ability to carry and display digital guidebooks for easy consumption on the go.</p>\r\n\r\n<p>Travellers also use their smartphones to:<br />\r\nnavigate around towns and cities, and locate hotels, transport hubs, restaurants, sights, attractions, ATMs, gas stations and other local amenities via various navigation apps<br />\r\nkeep track of their location on buses or trains so that they don&#39;t miss their bus stop or train station</p>	11	3	hsDSJ1m8WLYuiCJpiXFroEn9XrP4wR0mGGjwxPEN.jpg	1	1	2020-11-23 19:49:49	2020-11-25 14:52:19
\.


--
-- Data for Name: blog_videos; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.blog_videos (id, title_uz, title_ru, title_en, description_uz, description_ru, description_en, body_uz, body_ru, body_en, category_id, status, poster, video, created_by, updated_by, created_at, updated_at) FROM stdin;
1	2020 - 2021 yillarda yangi kompyuter yoki noutbukni qanday sotib olish mumkin	Как купить новый компьютер или ноутбук в 2020-2021 годах	How to Buy a New Computer or Laptop in 2020 - 2021	Sizning uchta tanlovingiz - bu ish stoli, noutbuk yoki hamma uchun mo'ljallangan kompyuterlar.	У вас есть три варианта: настольный, портативный или многофункциональный.	Your three choices are a Desktop, Laptop, or All-In-One Computers.	<p>Oltin qoida</p>\r\n\r\n<p>Uskuna bilan ishlashdan oldin, kompyuterni xarid qilishda sizga nima kerakligini va nimaga qodirligingizni aniqlashga yordam beradigan oddiy qoida mavjud.</p>\r\n\r\n<p>Eng yangi va eng qimmat texnologiya nima ekanligini bilib oling, so&#39;ngra imkoningiz boricha orqaga qarab harakat qiling. Zamonaviy texnologiyalar qimmatga tushadi, o&#39;tgan yilgi texnologiyalar esa hali ham qobiliyatli va ko&#39;pincha narxning yarmidan yuqori.</p>\r\n\r\n<p>Qaysi tovar va OEM kompyuterlarini tushunish</p>\r\n\r\n<p>Bizdan tez-tez qaysi markadagi kompyuterni sotib olishimiz so&#39;raladi va ochig&#39;ini aytganda, bu deyarli ahamiyatsiz. OEM ishlab chiqaruvchilari (Dell, Hewlett Packard, Lenovo va boshqalar) sotuvchilardan apparat sotib olishadi va sizga o&#39;zlarining markalari bilan moslashtirilgan versiyasini sotadilar va kafolat va qo&#39;llab-quvvatlaydilar. OEM ishlab chiqaruvchilari haqida ko&#39;proq ma&#39;lumot olish uchun OEM kompyuterlarda nimani anglatadi? Ga qarang. Ushbu maqola sizning vaqtingizning bir necha daqiqasiga to&#39;g&#39;ri keladi.</p>\r\n\r\n<p>Keyin, sizning apparat parametrlarini ko&#39;rib chiqaylik.</p>	<p>Золотое правило</p>\r\n\r\n<p>Прежде чем мы перейдем к аппаратному обеспечению, при покупке компьютера есть простое правило, которое поможет вам определить, что вам нужно и что вы можете себе позволить.</p>\r\n\r\n<p>Узнайте, что такое новейшая и самая дорогая технология, а затем вернитесь к тому, что вы можете себе позволить. Современные технологии дороги, в то время как технологии прошлого года все еще более чем способны и часто вдвое дешевле.</p>\r\n\r\n<p>Какой бренд и что такое OEM-компьютеры</p>\r\n\r\n<p>Нас часто спрашивают, какую марку компьютера покупать, и, честно говоря, это практически не актуально. OEM-производители (Dell, Hewlett Packard, Lenovo и т. Д.) Покупают оборудование у поставщиков и продают вам индивидуализированную версию со своей торговой маркой, а также предоставляют гарантию и поддержку. Для получения дополнительной информации о OEM-производителях см. Что означает OEM для компьютеров ?. Эта статья стоит нескольких минут вашего времени.</p>\r\n\r\n<p>Далее рассмотрим варианты вашего оборудования.</p>	<p><strong>The Golden Rule</strong><br />\r\n<br />\r\nBefore we proceed with hardware, there&#39;s a simple rule when shopping for a computer to help you determine what you need and what you can afford.<br />\r\n<br />\r\n<em>Find out what the newest, most expensive technology is, then work your ways backward to what you can afford</em>. Modern technology is costly, while technology from last year is still more than capable and often half the price.<br />\r\n<br />\r\n<strong>Which Brand and Understanding OEM Computers</strong><br />\r\n<br />\r\nWe&#39;re often asked what brand of computer to buy, and frankly, that&#39;s barely relevant. OEM manufacturers (Dell, Hewlett Packard, Lenovo, etc.) purchase hardware from vendors and sell you a customized version with their brand name on it and provide a warranty and support. For more information on OEM builders, see&nbsp;<strong><a href="https://www.majorgeeks.com/content/page/what_does_oem_mean_in_computers.html" onclick="window.open(this.href);return false;">What Does OEM Mean in Computers?</a></strong>. That article is worth a few minutes of your time.<br />\r\n<br />\r\nNext, let&#39;s consider your hardware options.</p>	1	3	NEXnVurD8faBcEGeuyxDCVyNNTMvN6lA6EmATtol.jpg	NlCkEJBcvYqz65RH3IiEFZPEN5V8gYj67VBjqfrt.mp4	1	1	2020-11-24 10:59:13	2020-11-25 15:02:24
3	Televizorlarni sotib olish bo'yicha qo'llanma	Руководство по покупке телевизора	TV Buying Guide	Ko'p yillar davomida barcha yangi televizorlar tekis panelli televizor ekanligini hisobga olib, televizor xarid qilish oddiy bo'lardi deb o'ylashingiz mumkin. Ammo televizor sotib olish hali ham ko'p tanlovlarni o'z ichiga oladi, ularning ba'zilari siz uchun yangi bo'lishi mumkin.	Вы можете подумать, что покупка телевизора будет простой задачей, учитывая, что все новые телевизоры уже много лет являются плоскими панелями. Но покупка телевизора по-прежнему предполагает множество вариантов, некоторые из которых могут быть для вас новыми.	You might think shopping for a TV would be simple, given that all new televisions have been flat-panel sets for many years now. But buying a TV still involves many choices, some of which may be new to you.	<p>Endi ko&#39;proq televizorlar yuqori dinamik diapazon yoki HDR deb nomlangan xususiyatga ega bo&#39;lib, ular yorqinroq, dinamikroq tasvirlar va yanada jonli, jonli ranglarni va&#39;da qilmoqda. Siz juda ko&#39;p Ultra High Definition (UHD) yoki 4K, televizorlarni va hattoki ba&#39;zi 8K televizorlarni ko&#39;rasiz, ular HDTV televizorlariga qaraganda yaxshiroq tasvir tafsilotlarini, shuningdek, yaxshilangan kontrast va rangni va&#39;da qilmoqda. Shunday qilib, siz kattaroq televizor sotib olsangiz, bitta savol - bu yangi 8K UHD televizorlardan biriga o&#39;tish vaqti keladimi yoki odatdagi 4K to&#39;plamini yopishtirish kerakmi.</p>\r\n\r\n<p>Bundan tashqari, OLED televizorlari kattaroq toifadagi toifalardagi bizning hozirgi televizion reytingimizda ustunlik qilishini sezishingiz mumkin. Ushbu to&#39;plamlar bozorda televizorlarning asosiy qismini tashkil etadigan LCD / LED modellariga qaraganda ancha qimmatroq - garchi bu narxlar farqi har yili kamayib borsa-da, shuning uchun siz eng yaxshi ko&#39;rsatkichga ega to&#39;plam uchun shov-shuvga sazovor bo&#39;ladimi-yo&#39;qligini hal qilishingiz kerak. Shuningdek, har yili eng yaxshi ishlaydigan LCD televizorlar yaxshilanadi va OLED televizorga o&#39;xshash ishlashga yaqinlashadi. Hozirda OLED televizorlari asosan LG Electronics va Sony kompaniyalarining ikkita brendida mavjud - bizda Skyworth deb nomlanayotgan OLED televizorini ham sinovdan o&#39;tkazdik, shuning uchun siz LCD-ga asoslangan to&#39;plamlardan ko&#39;ra tanlovingiz kamroq bo&#39;ladi.</p>	<p>Все больше телевизоров теперь имеют функцию, называемую расширенным динамическим диапазоном, или HDR, которая обещает более яркие, более динамичные изображения и более яркие, реалистичные цвета. Вы увидите множество телевизоров сверхвысокой четкости (UHD) или 4K, и даже некоторые телевизоры 8K, которые обещают лучшую детализацию изображения, чем телевизоры HDTV, а также улучшенную контрастность и цвет. Итак, один вопрос, с которым вы столкнетесь, если покупаете телевизор большего размера, заключается в том, пора ли перейти на один из этих новых телевизоров 8K UHD или придерживаться обычного набора 4K.</p>\r\n\r\n<p>Вы также можете заметить, что OLED-телевизоры доминируют в наших текущих рейтингах телевизоров в категориях больших размеров. Эти наборы по-прежнему дороже, чем модели с ЖК-дисплеями и светодиодами, которые составляют основную часть представленных на рынке телевизоров, хотя этот ценовой разрыв с каждым годом сокращается, поэтому вам нужно решить, стоит ли тратить деньги на высокопроизводительный набор. Кроме того, с каждым годом самые производительные ЖК-телевизоры становятся лучше, приближаясь к характеристикам OLED-телевизоров. В настоящее время OLED-телевизоры доступны в основном от двух брендов, LG Electronics и теперь Sony. Мы также протестировали OLED-телевизоры от нового бренда Skyworth, поэтому у вас будет меньше вариантов, чем с ЖК-телевизорами.</p>	<p>More TVs now have a feature called&nbsp;<a href="https://www.consumerreports.org/televisions/your-next-tv-will-probably-have-hdr-what-you-need-to-know/">high dynamic range, or HDR</a>, that promises brighter, more dynamic images, and more vivid, lifelike colors.&nbsp;You&rsquo;ll see plenty of&nbsp;<a href="https://www.consumerreports.org/tvs/best-tvs-of-the-year/">Ultra High Definition (UHD), or 4K, TVs</a>, and even some&nbsp;<a href="https://www.consumerreports.org/tvs/samsung-q900-8k-tv-review/">8K TVs</a>,&nbsp;which promise better picture detail than HDTVs offer, along with improved contrast and color. So one question you&rsquo;ll face if you&rsquo;re buying a larger TV is whether it&rsquo;s time to move to one of these newer 8K UHD TVs, or stick with a regular 4K set.</p>\r\n\r\n<p>You may also notice that&nbsp;<a href="https://www.consumerreports.org/lcd-led-oled-tvs/will-any-tvs-challenge-oled-in-2018-/">OLED TVs</a>&nbsp;dominate our current TV ratings in the larger size categories. These sets are still pricier than the LCD/LED models that make up the bulk of televisions on the market&mdash;though that price gap narrows every year&mdash;so you&rsquo;ll need to decide whether it&rsquo;s worth splurging for a top-performing set. Also, every year top-performing LCD TVs get better, edging closer to OLED TV-like performance. Right now OLED TVs are available mainly from two brands, LG Electronics and now Sony&mdash;we&rsquo;ve also tested an OLED TV from an emerging brand called Skyworth&mdash;so you&rsquo;ll have fewer choices than you will with LCD-based sets.</p>	1	3	JPyyoy73tYlsVqq2dUcZ9GltXqhQwFkhm3wzgiLk.jpg	eFYllNZ0G8C8rzs42TS87i6LCN4HoZ3HoV00yfTE.mp4	1	1	2020-11-24 11:13:13	2020-11-25 15:07:34
5	Sovutgichni tashkil qilishning eng yaxshi usuli	Лучший способ организовать холодильник	The Best Way to Organize a Fridge	Yaxshi tashkil etilgan, rang bilan muvofiqlashtirilgan muzlatgichni ko'rish hayratga soladi. (Yuqoridagi mukammal joylashtirilgan qalampirda adashmaslikka harakat qiling.)	Вид на хорошо организованный, подобранный по цвету холодильник завораживает. (Постарайтесь не потеряться в идеально расположенных перцах выше.)	It's mesmerizing to look at well-organized, color-coordinated refrigerator. (Try not to get lost in the perfectly placed peppers above.)	<p>Ishni boshlash uchun &quot;Yaxshi uy-ro&#39;zg&#39;orni sinovdan o&#39;tkazish oshxonasi&quot; mutaxassislari siz eng ko&#39;p erishadigan oziq-ovqat mahsulotlarini birinchi o&#39;ringa qo&#39;yishni maslahat berishadi. U erdan buyumlarni guruhlarga ajratib oling va ularni bir hil ko&#39;rinish uchun aniq idishlarga (kalit so&#39;z: aniq) joylashtiring. Qolganlari siz uchun: sodali gazli qutilar, haddan tashqari yuklangan tortmalar va o&#39;sib borayotgan vino saqlanishiga qarshi kurashish uchun turli xil saqlash echimlarini to&#39;plang.</p>\r\n\r\n<p>Raflarni javonlarga qo&#39;yayotganda, siz uchun va ovqatning o&#39;zi uchun eng mantiqiy narsani ko&#39;rib chiqing. Ko&#39;pchilik sutni yuqori tokchada yoki eshikda ushlab turishadi, lekin u eng sovuq bo&#39;lgan joyda pastki rafning orqasida turishi kerak. Xuddi shu narsa tuxumlarga ham tegishli: Tuxumlarni asl qutilarida harorat ko&#39;proq mos keladigan o&#39;rta yoki yuqori javonlarda saqlang. Sovutgich eshigini ziravorlar, sariyog &#39;, yumshoq pishloq va qayta ishlangan sharbatlar uchun zahiraga oling.</p>	<p>Для начала эксперты из Good Housekeeping Test Kitchen рекомендуют отдавать предпочтение продуктам, к которым вы привыкли больше всего. Затем распределите элементы по группам и поместите их в прозрачные контейнеры (ключевое слово: ясно) для более единообразного вида. Остальное зависит от вас: запаситесь различными решениями для хранения, которые помогут бороться с катящимися банками с газировкой, перегруженными ящиками для закусок и растущим винным тайником.</p>\r\n\r\n<p>Размещая продукты на полках, подумайте о том, что для вас больше всего подходит - и о самой еде. Большинство людей хранят молоко на верхней полке или в дверце, но оно должно находиться на задней стороне нижней полки, где оно наиболее холодное. То же самое и с яйцами: храните яйца в оригинальных картонных коробках на средних или верхних полках, где температура более стабильна. Оставьте дверцу холодильника для приправ, масла, мягких сыров и обработанных соков.</p>	<p>To get started, experts from the&nbsp;<em>Good Housekeeping&nbsp;</em>Test Kitchen recommend prioritizing the foods that you reach for most. From there, categorize items into groups and place them in&nbsp;<a href="https://www.goodhousekeeping.com/cooking-tools/food-storage-container-reviews/g2215/food-storage-containers/" target="_blank">clear containers</a>&nbsp;(key word: clear) for a more uniform look. The rest is up you: Stock up on different storage solutions to help combat rolling soda cans, overloaded snack drawers, and your growing wine stash.</p>\r\n\r\n<p>When placing items on shelves, consider what makes most sense for you &mdash; and for the food itself. Most people keep milk on the top shelf or in the door&nbsp;<em>but</em>&nbsp;it should go on the back of the bottom shelf where it&#39;s coldest.&nbsp;<a href="https://www.goodhousekeeping.com/food-recipes/easy/g428/easy-egg-recipes/" target="_blank">Same goes for eggs:</a>&nbsp;Store eggs in their original cartons on middle or top shelves where temperatures are more consistent. Reserve the fridge door for condiments, butters, soft cheeses, and processed juices.</p>	21	3	YQIF0AAH0TesAB8YN2UZRM3cbZLUiphnJ21NwHjT.jpg	Lq3eAEDlkF6UqY5KJiW1IIXcN2pWQ5deZuurRU5D.mp4	1	1	2020-11-24 11:25:18	2020-11-25 15:19:03
6	2020 yil uchun eng yaxshi portativ zaryadlovchi va quvvat banklari	Лучшие портативные зарядные устройства и аккумуляторы на 2020 год	The Best Portable Chargers and Power Banks for 2020	Tanlash uchun juda ko'p imkoniyatlar mavjud, qaysi elektr banki sizga mos kelishini qaerdan bilasiz? Ko'rib chiqish uchun eng muhim fikrlarni o'qing.	С таким количеством вариантов на выбор, как узнать, какой блок питания подходит вам? Продолжайте читать, чтобы учесть самые важные моменты.	With so many options to choose from, how do you know which power bank is right for you? Read on for the most important points to consider.	<p>Elektr tok manbaiga yaqin joyda bo&#39;lmaganingizda, telefoningiz yoki planshetingizda sharbatning doimiy ravishda tugashini kuzatish juda qiyin. Yaxshiyamki, uchinchi tomon zaxira batareyalari etishmayapti va ular batareyangiz belgisi qizil rangga kira boshlaganda qurilmangizni ushlab turish uchun har qanday o&#39;lcham, quvvat va narx oralig&#39;ida bo&#39;ladi. Va bu bilan tugamaydi. Ba&#39;zi quvvat banklari tez zaryadlash, simsiz zaryadlash, o&#39;rnatilgan kabellar, o&#39;zgaruvchan tok adapterlari, LED yoritgichlar, hattoki mashinangizni sakrab ishga tushirish kabi xususiyatlar bilan jihozlangan.</p>	<p>Наблюдать за тем, как в вашем телефоне или планшете постоянно кончается заряд, когда вы не находитесь рядом с розеткой, вызывает стресс. К счастью, нет недостатка в резервных батареях сторонних производителей, и они бывают любого размера, емкости и ценового диапазона, чтобы ваше устройство продолжало работать, когда значок батареи начинает опускаться в красный цвет. И это еще не все. Некоторые блоки питания оснащены такими функциями, как быстрая зарядка, беспроводная зарядка, встроенные кабели, адаптеры переменного тока, светодиодные фонарики - даже возможность запуска двигателя от внешнего источника.</p>	<p>Watching your&nbsp;<a href="https://www.pcmag.com/picks/the-best-phones">phone</a>&nbsp;or&nbsp;<a href="https://www.pcmag.com/picks/the-best-tablets">tablet</a>&nbsp;steadily run out of juice when you&#39;re nowhere near a power outlet is stressful. Fortunately, there&#39;s no shortage of third-party backup batteries, and they come in every size, capacity, and price range to keep your device going when your battery icon starts to dip in the red. And it doesn&#39;t end there. Some power banks are equipped with features like fast charging, wireless charging, built-in cables, AC adapters, LED flashlights&mdash;even the ability to jump-start your car.</p>	11	3	ekwCT4EcmOXqBRcv62ANgAil8bXUbzhbgFCdJl0q.jpg	RCmvOnRopPB3mXyWeV1kqDKQzcYnewVhBK45uSxm.mp4	1	1	2020-11-24 11:29:24	2020-11-25 15:19:51
2	Har doim zamonaviy ko'rinishingizni ta'minlash uchun 8 ta moda maslahati	8 модных советов, которые помогут вам всегда выглядеть стильно	8 Fashion Tips to Ensure You Always Look Stylish	Bir nechta ishonchli maslahatlar bilan o'zingizning usta stilistingiz bo'ling.	Станьте собственным мастером-стилистом, воспользовавшись несколькими надежными советами.	Become your own master stylist with a few reliable tips.	<p>Kaps&uuml;lli shkaf bilan ishlang. Sizda shkafning ishonchli shtapellari borligiga ishonch hosil qiling: ikonik kichkina qora ko&#39;ylak, jinsi shimlar mukammal tarzda mos keladi, klassik blazer, neytral rangdagi oddiy futbolkalar va tugmachalar va oson teridan tikilgan ko&#39;ylagi (yoki denim ko&#39;ylagi). Aralashma va o&#39;xshashlik asoslarini kapsuladan tashkil topgan to&#39;plamga sarmoya kiritish (va ularni qanday uslubda tayyorlashni o&#39;rganish) bu birlashtirishning kalitidir.<br />\r\nSizning kiyimlaringiz mukammal tarzda joylashtirilganligiga ishonch hosil qiling. Har qanday kiyimni hayratlanarli qilish uchun bitta hiyla - yaxshi tikuvchini yollash. Tikilgan kiyim nafaqat sayqallangan ko&#39;rinishga ega, balki o&#39;zlarini yanada qulay his qiladi. Erga sudrab boradigan shim va noqulay to&#39;plangan liboslar sizga o&#39;zingizni zamonaviy his etmaydi. Agar sizning kapsulali shkafingiz sizga yaxshi mos keladigan bo&#39;lsa, siz ortiqcha va kichik o&#39;lchamdagi narsalar bilan beparvo emas, modani his qiladigan tarzda o&#39;ynashni boshlashingiz mumkin.</p>	<p>Работайте со своим капсульным гардеробом. Убедитесь, что у вас есть надежные предметы гардероба: культовое маленькое черное платье, пара идеально сидящих по размеру джинсов, классический блейзер, простые футболки и пуговицы нейтральных цветов, а также непринужденная кожаная куртка (или джинсовая куртка). Вложение в капсульную коллекцию основ смешивания и подбора (и изучение того, как их стилизовать) - ключ к тому, чтобы выглядеть вместе.<br />\r\nУбедитесь, что ваша одежда идеально сидит. Один из способов сделать любой предмет одежды потрясающим - это нанять хорошего портного. Одежда, подобранная по индивидуальному заказу, не только выглядит безупречно, но и более удобна. Брюки, которые тянутся по земле, и платья, которые неуклюже сбиваются в кучу, не заставят вас чувствовать себя стильно. Если ваш капсульный гардероб вам подходит, вы можете начать играть с вещами слишком большого или меньшего размера, чтобы это выглядело модно, а не небрежно.</p>	<p>Work your capsule wardrobe. Make sure you have reliable wardrobe staples: an iconic little black dress, a pair of jeans that fit perfectly, a classic blazer, simple T-shirts and button-downs in neutral colors, and an effortless leather jacket (or denim jacket). Investing in a capsule collection of mix-and-match basics (and learning how to style them) is the key to looking put together.<br />\r\nMake sure your clothes fit perfectly. One trick to making any item of clothing look amazing is to hire a good tailor. Tailored clothing not only looks polished, but it also feels more comfortable. Pants that drag on the ground and dresses that bunch up awkwardly won&#39;t make you feel stylish. If your capsule wardrobe fits you well, you can start to play with over- and under-sized items in a way that feels fashionable, not sloppy.</p>	4	3	Aao9PQFKg1Qe8gXfKdKUXzb97VhPG7b5QarRFaWe.jpg	phix0vBLAG7lukCg2dtFII03jIGZXNEYQzaMErHO.mp4	1	1	2020-11-24 11:05:21	2020-11-25 15:20:26
8	Oshxona aralashtirgichlari uchun qo'llanma sotib olish	Руководство по покупке кухонных блендеров	Purchase a manual for kitchen mixers	Ba'zilar oshxona aralashtirgichi muhim ahamiyatga ega emas deb aytsalar, boshqalari katta miqdordagi aralashtirgichga tayanadi va ularsiz yo'qolib ketadi.	В то время как некоторые скажут, что кухонный блендер не является необходимым, другие в значительной степени полагаются на свой блендер и были бы потеряны без него.	While some would say that a kitchen blender is not an essential, others rely heavily on their blender and would be lost without one.	<p>Sotib olish uchun turli xil aralashtirgichlar mavjud, ularning ba&#39;zilari asosiy funktsiyalarga ega, boshqalari qattiq ovqatlarni qayta ishlay oladi yoki sho&#39;rva pishiradi. Banka aralashtirgichlari quvvati, ishi va pichog&#39;i dizayniga qarab o&#39;zgarib turadigan xususiyatlari, hajmi va narxlari bilan eng mashhurdir. Ko&#39;p funktsiyali aralashtirgichlar ko&#39;p qirrali, ammo qimmatga tushadi. Qo&#39;l yoki immersion aralashtirgichlar, odatda, maydalagich qo&#39;shimchasi yoki maxsus pichoq dizayni bilan jihozlanmagan bo&#39;lsa, asosiy pyuresi, aralashtirish va aralashtirish xususiyatlariga ega. Aksariyat qo&#39;l aralashtirgichlari elektr bo&#39;lsa-da, simsiz modellar ushbu oshxona vositasiga yana bir qulaylik darajasini qo&#39;shadi. Shaxsiy aralashtirgichlar turli xil funktsiyalarga ega.</p>	<p>Можно купить множество блендеров, некоторые из которых имеют базовые функции, а другие могут обрабатывать твердую пищу или готовить суп. Баночные блендеры являются наиболее популярными, их характеристики, емкость и цена варьируются в зависимости от мощности, функции и конструкции лезвия. Многофункциональные блендеры более универсальны, но дороги. Ручные или погружные блендеры обычно имеют базовые функции пюреобразования, смешивания и смешивания, если только они не оснащены приспособлением для измельчения или специальной конструкцией лезвий. Хотя большинство ручных блендеров электрические, беспроводные модели добавляют этому кухонному инструменту еще один уровень удобства. Персональные блендеры имеют различные функции.</p>	<p>There&#39;s quite a variety of&nbsp;<a href="https://www.thespruceeats.com/best-blenders-to-buy-4062976">blenders available to buy</a>, some with basic functions while others can process hard foods or cook soup. Jar blenders are the most popular with features, capacity, and prices that vary depending on power, function, and blade design. Multifunction blenders are more versatile but costly.&nbsp;<a href="https://www.thespruceeats.com/immersion-blender-definition-1907910">Hand or immersion blenders</a>&nbsp;usually have basic pureeing, mixing, and blending features, unless accessorized with a chopper attachment or special blade design. While most hand blenders are electric, cordless models add another level of convenience to this kitchen tool.&nbsp;<a href="https://www.thespruceeats.com/best-personal-blenders-4072910">Personal blenders</a>&nbsp;have various functions.</p>	18	3	ZSTk8HEeWPOMiYVjYfr2ZXRUtnCxCuh01I06UiT2.jpg	lzGvND4cH3z8DHlx8MeDtirhjEPDKIzdafok6Q0Q.mp4	1	1	2020-11-24 11:41:02	2020-11-25 15:23:31
4	Google Xaridlar reytingini qanday yaxshilash mumkin	Как улучшить свой рейтинг в Google Покупках	How To Improve Your Google Shopping Ranking	Google o'zining savdo-sotiq kampaniyasining xususiyatini ko'plab nomlar bilan - "do'kon oynasi", "hayot chizig'i" va "old eshikni kutib oluvchi" deb ataydi.	Google называет свою торговую кампанию множеством названий - «витрина», «спасательный круг» и «встреча с входной дверью».	Google calls its Shopping campaign feature by many names- ‘shop window’, ‘lifeline’, and ‘front-door greeter’.	<p>Shunday qilib, Google Shopping reytingini yaxshilash uchun bu butun qidiruv reklama va raqamli marketing strategiyasini yaratish yoki buzish degani. Ammo reyting va optimallashtirishga kirishishdan oldin, Google Shopping nima ekanligini tushunish muhimdir.</p>\r\n\r\n<p>Google Merchant Center-ga bog&#39;langan ushbu vosita elektron tijorat biznesiga sizning reklamangizni mahsulot tasviri va mahsulot nomi bilan Google qidiruv tizimining natijalari sahifasining yuqori qismida va ba&#39;zi Google platformalarida ko&#39;rsatishga imkon beradi. Keyin foydalanuvchilar o&#39;zlari joylashgan sahifani yoki dasturni tark etmasdan mahsulotlarni qidirishlari, ko&#39;rishlari va taqqoslashlari mumkin. Agar ular ba&#39;zi bir mahsulot reklamalariga qiziqish bildirsalar, bosish orqali ularni reklama qilingan narsalarga qarab, ochilish sahifasi, toifalar sahifasi yoki singular mahsulot sahifasi - biznes veb-sayt sahifasiga olib boradi.</p>	<p>Само собой разумеется, что для повышения рейтинга Google Покупок нужно создать или разрушить всю их стратегию поисковой рекламы и цифрового маркетинга. Но прежде чем переходить к ранжированию и оптимизации, важно понять, что такое Google Покупки.</p>\r\n\r\n<p>Этот инструмент, связанный с Google Merchant Center, позволяет предприятиям электронной коммерции показывать вашу рекламу с изображением продукта и названием продукта в верхней части страницы результатов поиска Google и на определенных платформах Google. После этого пользователи могут искать, просматривать и сравнивать продукты, не покидая страницу или приложение, в котором они работают. Если они заинтересованы в рекламе товаров, переход по клику приведет их на страницу бизнес-сайта - либо целевую страницу, страницу категории или страницу отдельного продукта, в зависимости от того, что рекламировалось.</p>	<p>It goes without saying, then, that to<a href="https://www.adnabu.com/improve-google-shopping-ranking?hsLang=en" rel="noopener" target="_blank">&nbsp;improve Google Shopping ranking</a>&nbsp;is to make or break their entire search ad and digital marketing strategy. But before getting into rankings and optimization, it is important to understand what Google Shopping is.<br />\r\n<br />\r\nThe tool, which links to&nbsp;<a href="https://www.google.com/retail/solutions/merchant-center/" rel="noopener" target="_blank">Google Merchant Center</a>, allows eCommerce businesses to show your ad, with the product image and product title, on the top of Google&rsquo;s search engine results page and across certain Google platforms. Users can then search, view, and compare products without having to leave the page or application they&rsquo;re on. If they&rsquo;re interested in some product ads, a click-through will lead them to the business website page- either a landing page, category page or singular product page, depending on what had been advertised.</p>	1	3	4JCVQNE81l5AfuHyTHMEAvL9iBTJzdDHpRFGrkV4.jpg	ooxnHzGm7vepjudPRyUbhRbelpLT0Wv83GFKE0yd.mp4	1	1	2020-11-24 11:18:46	2020-11-25 15:18:29
7	Eng yaxshi changyutgichni qanday tanlash mumkin	Как выбрать лучший пылесос	How to Choose the Best Vacuum Cleaner	Bozorda juda ko'p har xil turdagi changyutgichlar mavjudki, sizning ehtiyojlaringizga eng mos keladigan changyutgichni qanday tanlashni hal qilish chalkash bo'lishi mumkin.	На рынке так много разных типов пылесосов, что может возникнуть путаница при выборе пылесоса, который лучше всего соответствует вашим потребностям.	There are so many different types of vacuum cleaners on the market that it can be confusing to decide how to choose a vacuum cleaner that best fits your needs.	<p>Ushbu maqola sizning uyingiz uchun asosiy changyutgichni qanday tanlashga qaratilgan. Shunday qilib, qo&#39;l changyutgichlari, avtomobil changyutgichlari, nam / quruq changyutgichlar kabi maxsus yoki ikkilamchi changyutgichlarni chetga surib, ikkita asosiy turdagi changyutgichni tanlash mumkin: tik va qutilar.</p>\r\n\r\n<p>Diklar an&#39;anaviy ravishda AQSh va Buyuk Britaniyada changyutgichning eng sevimli turi bo&#39;lib kelgan. Evropada va dunyoning qolgan qismida qutilar tanlangan changyutgichdir.</p>\r\n\r\n<p>Odatda tik tirgaklar qo&#39;zg&#39;alishni ta&#39;minlash uchun aylanadigan cho&#39;tka rulosiga ega va assimilyatsiyani ta&#39;minlaydigan bitta motorga ega bo&#39;lishi mumkin, shuningdek aralashtirgich cho&#39;tkasini aylantiradi yoki ikkita dvigatelga ega bo&#39;lishi mumkin, biri assimilyatsiya qilish uchun, ikkinchisi esa cho&#39;tkani haydash uchun.</p>	<p>Эта статья посвящена тому, как выбрать первичный пылесос для дома. Таким образом, помимо специальных или вторичных пылесосов, таких как ручные пылесосы, автомобильные пылесосы, пылесосы для влажной / сухой уборки, есть два основных типа пылесосов на выбор: стойки и канистры.</p>\r\n\r\n<p>Вертикальные стойки традиционно были любимым типом пылесосов в США и Великобритании. В Европе и во всем мире канистры - предпочтительный пылесос.</p>\r\n\r\n<p>Стойки обычно имеют вращающийся щеточный валик для перемешивания и могут иметь один двигатель, который обеспечивает всасывание, а также вращает щетку мешалки, или могут иметь два двигателя: один для всасывания, а другой для привода щетки.</p>	<p>This article is focused on how to choose a primary vacuum cleaner for your home. So, setting aside specialty or secondary vacuum cleaners, such as hand vacuums, car vacuums, wet/dry vacuums, there are two major types of vacuum cleaners to choose from: &nbsp;uprights and canisters.</p>\r\n\r\n<p>Uprights have traditionally been the favorite type of vacuum cleaner in the U.S. and Great Britain. In Europe and the rest of the world, canisters are the vacuum cleaner of choice.</p>\r\n\r\n<p>Uprights generally have a revolving brush roll to provide agitation and may have one motor that provides the suction and also turns the agitator brush, or it may have two motors, one to provide suction and one to drive the brush.</p>	10	3	c1jtb3u5XIh0ToJOuDNmUDHlzgvlny1v0y0AnoK3.jpg	SezsL89uDzjsAM4qzVFJOmC4I8z1XpS27CNZpEpw.mp4	1	1	2020-11-24 11:37:11	2020-11-25 15:21:05
9	Yangi konditsioner sotib olishdan oldin bilishingiz kerak bo'lgan hamma narsalar	Все, что вам нужно знать, прежде чем покупать новый кондиционер	Everything You Need to Know Before You Buy a New Air Conditioner	Issiq kunda konditsionerdan yaxshiroq narsa yo'q - va texnologiya tobora sovuqlashib bormoqda.	Нет ничего лучше, чем кондиционер в жаркий день - а технологии становятся все круче.	There's nothing better than air conditioning on a hot day — and the technology keeps getting cooler.	<p>Konditsionerlarning to&#39;rtta asosiy turi mavjud. Ular:</p>\r\n\r\n<p>1. Derazaga o&#39;rnatilgan konditsionerlar<br />\r\nKonditsionerning eng keng tarqalgan turi bu derazaga o&#39;rnatiladigan blok bo&#39;lib, u vaqtincha deraza ochilishida joylashgan. Agar sizning uyingiz o&#39;rtacha haroratli hududda joylashgan bo&#39;lsa, qo&#39;shimcha sovutish uchun faqat sovutish moslamasini yoki qo&#39;shimcha issiqlik uchun sovutish / isitish moslamasini sotib olishingiz mumkin. Agar siz shimolda yashasangiz, iliq ob-havo mavsumi oxirida birliklarni olib tashlash yaxshidir.</p>	<p>Существует четыре основных типа кондиционеров. Они есть:</p>\r\n\r\n<p>1. Оконные кондиционеры.<br />\r\nСамый распространенный тип кондиционера - это оконный блок, который временно располагается в оконном проеме. Вы можете купить блок только для охлаждения или блок для охлаждения / нагрева для дополнительного тепла, если ваш дом расположен в районе с умеренными температурами. Если вы живете на севере, хорошо убирать юнитов в конце теплого сезона.</p>	<p>There are four main types of air-conditioning units. They are:</p>\r\n\r\n<p>1. Window-mounted air conditioners<br />\r\nThe most common type of air conditioner is a window-mounted unit, which temporarily resides in a window opening. You can buy a cooling-only unit or a cooling/heating unit for supplemental heat if your home is located in an area with moderate temperatures. If you live in the north, it&#39;s good to remove units at the end of the warm weather season.</p>	1	3	Pgk0zFIL9Ti1OekjoOve39kIMz6swqYyT2llXEk4.jpg	qyQRfRZzM5KgYrNd5baxGGGlT6vUcd6PcmLXrLRM.mp4	1	1	2020-11-24 11:48:23	2020-11-25 15:22:14
10	Eng yaxshi konditsionerni qanday sotib olish mumkin	Как купить лучший кондиционер	How to buy the best air conditioner	Eng yaxshi konditsionerni tanlash qiyin bo'lishi mumkin. Sizga qanday o'lchamda kerak? Yugurish qancha turadi va u qanchalik shovqinli bo'ladi? Biz sizga uyingiz uchun mos modelni topishda yordam beramiz.	Выбор лучшего кондиционера может оказаться сложной задачей. Какой размер вам нужен? Сколько будет стоить работа и насколько шумно? Мы поможем вам подобрать подходящую модель для вашего дома.	Choosing the best air conditioner can be a challenge. What size do you need? How much will it cost to run and how noisy will it be? We'll help you find the right model for your home.	<p>Ular ikkita qismdan iborat: ichki blok va tashqi blok, sovutgich gazini o&#39;z ichiga olgan quvurlar bilan bog&#39;langan. Ular Avstraliyada eng keng tarqalgan konditsioner turidir va xona yoki ochiq maydon uchun taxminan 60m2 gacha yaxshi. Narxlari oralig&#39;i: $ 600 - $ 5500.</p>\r\n\r\n<p>Ko&#39;p bo&#39;linish<br />\r\nSplit-tizimga o&#39;xshaydi, lekin ikkita tashqi qurilmaga ulangan bitta tashqi blok bilan. Bir-biriga oqilona yaqin bo&#39;lgan ikkita yoki uchta xona uchun yaxshi, ayniqsa alohida split-tizimlar yoki kanalli tizim mos kelmasa. Ekvivalent alohida split-tizimlar bilan bir xil narx oralig&#39;ida.</p>	<p>Они состоят из двух частей: внутреннего блока и наружного блока, соединенных трубами с газообразным хладагентом. Они являются наиболее распространенным типом кондиционеров в Австралии и подходят для комнаты или открытой планировки площадью до 60 м2. Ценовой диапазон: 600-5500 долларов.</p>\r\n\r\n<p>Мульти-сплит<br />\r\nАналогично сплит-системе, но с одним наружным блоком, подключенным к двум или более внутренним блокам. Подходит для двух или трех комнат, которые расположены достаточно близко друг к другу, особенно когда отдельные сплит-системы или канальная система не подходят. Примерно в том же ценовом диапазоне, что и на аналогичные раздельные сплит-системы.</p>	<p>These have two parts: an indoor unit and an outdoor unit, connected by pipes containing refrigerant gas. They are the most common air conditioner type in Australia, and are good for a room or open plan area up to about 60m<sup>2</sup>. Price range: $600-$5500.</p>\r\n\r\n<h5>Multi-split</h5>\r\n\r\n<p><strong>Similar to a split-system, but with one outdoor unit connected to two or more indoor units. Good for two or three rooms that are reasonably close together, especially when separate split-systems or a ducted system aren&#39;t suitable. About the same price range as the equivalent separate split-systems.</strong></p>	1	3	BShJw2jVXxFYvBp75pZlDAbwzI9qYWrxWn5TqLuQ.jpg	JbRQ6O6ujmFggJqODlGqTKEGMi85XWwnaqqRljrs.mp4	1	1	2020-11-24 11:51:02	2020-11-25 15:22:52
\.


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.brands (id, name_uz, name_ru, name_en, slug, logo, meta_json, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.categories (id, name_uz, name_ru, name_en, description_uz, description_ru, description_en, slug, meta_json, "left", "right", parent_id, photo, icon, created_by, updated_by, created_at, updated_at) FROM stdin;
2	Televizorlar	Телевизоры	Televisions	<table>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>\r\n\t\t\t<p>Televizion (televizor), ba&#39;zan tele yoki telliga qisqartirilsa, harakatlanuvchi tasvirlarni monoxrom (qora va oq) yoki rangli va ikki yoki uch o&#39;lchovli va tovushli uzatishda ishlatiladigan telekommunikatsiya vositasidir. Bu atama televizor, televizion ko&#39;rsatuv yoki televidenie orqali uzatilishi mumkin.</p>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>	<table>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>\r\n\t\t\t<p>Телевидение (ТВ), иногда сокращенно до теле или телик, представляет собой телекоммуникационную среду, используемую для передачи движущихся изображений в монохромном (черно-белом) или цветном, а также в двух или трех измерениях и звуке. Термин может относиться к телевизору, телешоу или телепередачам.</p>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>	<table>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>\r\n\t\t\t<p><strong>Television</strong>&nbsp;(<strong>TV</strong>), sometimes shortened to tele or telly, is a telecommunication medium used for transmitting moving images in monochrome (black and white), or in color, and in two or three dimensions and sound. The term can refer to a&nbsp;<strong>television</strong>&nbsp;set, a&nbsp;<strong>television</strong>&nbsp;show, or the medium of&nbsp;<strong>television</strong>&nbsp;transmission.</p>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>	tvs	\N	2	3	1	ubeIaotuBtU7D7pTIpnMdOx8UilcujOpwHuCqM7g.jpg	02eSznquexKVjvQdkMuqkAZfOaDvoqX38IsjwUlu.png	1	1	2020-11-24 16:08:55	2020-11-25 09:12:49
15	Noutbuklar	Ноутбуки	Laptops	<p>Barcha yangi noutbuklarni xarid qiling</p>	<p>Покупайте все новые ноутбуки</p>	<p>Shop all new&nbsp;<em>laptops</em></p>	laptops	\N	28	29	14	OMjnA3cQIwpZYqvHHnZwMqvsOQmBqibhK23beBPA.jpg	do4z0U7yjZricdXE91sLLJj22J6Gcc2SNSr0cdMi.png	1	1	2020-11-25 10:29:26	2020-11-25 10:29:26
25	Foto va video	Фото и видео	Photo and video	<p>Foto va video bu yaxshi narsa</p>	<p>Фото и видео - вещь хорошая</p>	<p>Photo and video is a good thing</p>	photo_video	\N	49	54	\N	RDvoKtIobJBSdmEaPBfsdUNtE4lRSRcTFZnCtAVi.jpg	eqCkG4zWTM1FzcQBqsg1sW4HKfhkD1VDVboJKgy7.png	1	1	2020-11-25 11:23:32	2020-11-25 11:23:32
14	Komyuterlar	Компьютеры	Computers	<p>Kompyuter - bu kompyuter dasturlash orqali avtomatik ravishda arifmetik yoki mantiqiy operatsiyalar ketma-ketligini bajarishga buyruq beradigan mashina.</p>	<p>Компьютер - это машина, которой можно поручить автоматическое выполнение последовательностей арифметических или логических операций с помощью компьютерного программирования.</p>	<p>A&nbsp;<em>computer</em>&nbsp;is a machine that can be instructed to carry out sequences of arithmetic or logical operations automatically via&nbsp;<em>computer</em>&nbsp;programming.</p>	computers	\N	27	34	\N	0poqn5Rjp6wyWbNeQg7dEJ9UYFH84yrU8XuOgfTx.jpg	o4gKLamrljndVDkQLkZGqpdGMlvI2er4bpZNiUTr.png	1	1	2020-11-25 10:25:33	2020-11-25 10:25:33
19	Oshxona mebellari	Мебель для кухни	Kitchen furniture	<p>Oshxona mebellarini sotib oling</p>	<p>Купить кухонную мебель</p>	<p>Buy kitchen furniture</p>	kitchen_furniture	\N	36	37	18	34KmgE8ZHu4jjjjRXvaxEUSawy7TgXTHKATt0Me7.jpg	cLU611tkPfZ1A5V8E6rNsHaiV1CproqIEp8rqRpc.png	1	1	2020-11-25 10:46:14	2020-11-25 10:46:14
21	Muzlatgich	Холодильник	Refrigerator	<p>Sovutgich sizning oshxonangizni ajratib turadi</p>	<p>Холодильник выделяет вашу кухню</p>	<p>A&nbsp;<em>refrigerator</em>&nbsp;sets your kitchen apart</p>	refrigerator	\N	40	41	18	G8R5c1g6bnLxKfhtFEXwT7DI4alOsPaGZpyD3SKR.jpg	d0fsmAtA6g8GGbvfS1k3N8wbmwBHZ6RmmybuywmH.png	1	1	2020-11-25 11:05:32	2020-11-25 11:05:32
23	O'yinlar	Игры	Games	<p>O&#39;yin - bu o&#39;yinning tuzilgan shakli</p>	<p>Игра - это структурированная форма игры</p>	<p>A game is a structured form of play</p>	games	\N	45	48	\N	LKh8mFDwfpGSNV3gn9wrVZFtM3ycwCrZltEXPvR7.jpg	4QCJi8VB8b29vO0B9LUKllfTwHNDRBkGv1cBGKnF.png	1	1	2020-11-25 11:16:47	2020-11-25 11:16:47
27	Video kamera	Видеокамера	Videocamera	<p>Videokamera sotib oling</p>	<p>Купить видеокамеру</p>	<p>Buy a videocamera</p>	videocamera	\N	52	53	25	DvoIOF4MdMzPtjRjwZaVgKorkrMIDRBjZO5rwAZk.jpg	okhI4t8rEFB6Uca9hqCr4VQIFsJ3zUQbnSpXjmBw.png	1	1	2020-11-25 11:30:12	2020-11-25 11:30:12
1	Televizorlar va dvd playerlar	Телевизоры и dvd-плейеры	TVs and dvd players	<p>Televizion (televizor), ba&#39;zan tele yoki telliga qisqartirilsa, harakatlanuvchi tasvirlarni monoxrom (qora va oq) yoki rangli va ikki yoki uch o&#39;lchovli va tovushli uzatishda ishlatiladigan telekommunikatsiya vositasidir. Bu atama televizor, televizion ko&#39;rsatuv yoki televidenie orqali uzatilishi mumkin.</p>	<p>Телевидение (ТВ), иногда сокращенно до теле или телик, представляет собой телекоммуникационную среду, используемую для передачи движущихся изображений в монохромном (черно-белом) или цветном, а также в двух или трех измерениях и звуке. Термин может относиться к телевизору, телешоу или телепередачам.</p>	<p><strong>Television</strong>&nbsp;(<strong>TV</strong>), sometimes shortened to tele or telly, is a telecommunication medium used for transmitting moving images in monochrome (black and white), or in color, and in two or three dimensions and sound. The term can refer to a&nbsp;<strong>television</strong>&nbsp;set, a&nbsp;<strong>television</strong>&nbsp;show, or the medium of&nbsp;<strong>television</strong>&nbsp;transmission.</p>	tvs_dvdplayers	\N	1	6	\N	5apR6N5SguWqj2GfbYEcgHFUboVfEKyMUt3BvSUn.jpg	NQrUQFW9YonX23eP84adhpUQPl6v6vKn2J3OY9er.png	1	1	2020-11-23 11:55:53	2020-11-25 09:19:02
20	Gaz plitalari	Газовые плиты	Gas stoves	<p>Gaz pechkasi - yonuvchan gaz bilan ta&#39;minlanadigan pechka</p>	<p>Газовая плита - это плита, которая работает на горючем газе.</p>	<p>A gas stove is a stove that is fuelled by combustible gas&nbsp;</p>	gas_stoves	\N	38	39	18	zAZ1QWw560QMy5VfhuvEzyrf7m2fyISitCyNNz19.jpg	7mejoXXRMyLZMlf0K832GtWAU4fVYG5CDWkeIfeC.png	1	1	2020-11-25 10:57:55	2020-11-25 10:57:55
18	Oshxona	Кухня	Cookroom	<p>Oshpazlik uchun oshxona</p>	<p>Кухня или помещение для приготовления еды.</p>	<p>A kitchen or room for cookery.</p>	cookroom	\N	35	44	\N	aEBcLsM170Os14jbgNJgUnqTJwBT0fEQ2zJeHwQl.jpg	yadY7MiCNJFNYFUqNvw3ShdpXyIUDZedLp9ow61j.png	1	1	2020-11-25 10:42:40	2020-11-25 10:42:40
22	Blenderlar	Блендеры	Blenders	<p>Blender - bu faqat siz uchun moslama</p>	<p>Блендер - это именно то, что вам нужно</p>	<p>A blender is just the appliance for you</p>	blenders	\N	42	43	18	P84666O9Xrcbcag8wOoJTcnjt4u60zLH8ZJlhEuj.jpg	JzEzoNHWBl5MiCtSjRMoCS6dik4rcarfNwxeMxAk.png	1	1	2020-11-25 11:12:04	2020-11-25 11:12:04
24	Playstation	Playstation	Playstation	<p>PlayStation is a &nbsp;video game brand</p>	<p>PlayStation - это бренд видеоигр</p>	<p>PlayStation is a &nbsp;video game brand</p>	playstation	\N	46	47	23	5zJjJv22f1csu8BTS4xuXf87V3CMjwEsAO4fBgRh.jpg	Q0wB3rUfwQrgAWboPyLB3bwDWUbK3yYhFDHaVSRD.png	1	1	2020-11-25 11:20:14	2020-11-25 11:20:14
26	FotoKamera	Фотокамера	Fotocamera	<p>Fotokamera sotib oling</p>	<p>Купить камеру</p>	<p>Buy a fotocamera</p>	fotocamera	\N	50	51	25	q98CWKza45lH1WjErrEx3nVma63areH6Q1u5rlGY.jpg	yS68CIhUnqGaTexntQ5NEdiKzXfZvfmCgu6W56no.png	1	1	2020-11-25 11:27:55	2020-11-25 11:27:55
3	Dvd playerlar	Dvd-плейеры	Dvd players	<p>Televizion (televizor), ba&#39;zan tele yoki telliga qisqartirilsa, harakatlanuvchi tasvirlarni monoxrom (qora va oq) yoki rangli va ikki yoki uch o&#39;lchovli va tovushli uzatishda ishlatiladigan telekommunikatsiya vositasidir. Bu atama televizor, televizion ko&#39;rsatuv yoki televidenie orqali uzatilishi mumkin.</p>	<p>елевидение (ТВ), иногда сокращенно до теле или телик, представляет собой телекоммуникационную среду, используемую для передачи движущихся изображений в монохромном (черно-белом) или цветном, а также в двух или трех измерениях и звуке. Термин может относиться к телевизору, телешоу или телепередачам.</p>	<table>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>\r\n\t\t\t<p><strong>Television</strong>&nbsp;(<strong>TV</strong>), sometimes shortened to tele or telly, is a telecommunication medium used for transmitting moving images in monochrome (black and white), or in color, and in two or three dimensions and sound. The term can refer to a&nbsp;<strong>television</strong>&nbsp;set, a&nbsp;<strong>television</strong>&nbsp;show, or the medium of&nbsp;<strong>television</strong>&nbsp;transmission.</p>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>	dvd_players	\N	4	5	1	7UeiKwFPQAIut93TjnYNHG9i6GPswCX8SgBLy9Bl.jpg	v0a5wDY1lPNiZCyg6QqtPVCkerFsyWlvrMHfpxLe.png	1	1	2020-11-25 09:17:49	2020-11-25 09:19:34
5	Oyoq kiyimlar	Oбувь	Shoes	<p>Poyafzal, etik, sandal, poshnali va boshqa ko&#39;plab narsalarni xarid qiling</p>	<p>Купите огромный выбор обуви, сапог, сандалий, каблуков и многого другого.</p>	<p>Shop a huge selection of&nbsp;<em>shoes</em>, boots, sandals, heels and more</p>	shoes	\N	8	9	4	URmSHZojMKVyUsnefRnVMrivCOy7Qbx8qMt8saSp.jpg	pYEMqGug7ybP5COXyAk0QhlAzve6JHpkW0NJzxsH.png	1	1	2020-11-25 09:41:53	2020-11-25 09:41:53
6	Ko'ylaklar	Платья	Dresses	<p>Ko&#39;ylaklar har qanday uslubda va o&#39;lchamda bo&#39;ladi</p>	<p>Рубашки бывают всех стилей и размеров.</p>	<p><em>Shirts</em>&nbsp;come in all styles and sizes</p>	shirts	\N	10	11	4	nBwJiCsT00s7uZ5c7nXcst2qPCi58RevMxTBrVQH.jpg	SHNMyll41X5VGJJA8iYeuoPyBjdwxeg77prTzYEL.png	1	1	2020-11-25 09:45:23	2020-11-25 09:45:23
4	Kiyim-kechak	Одежда	Clothing	<p>Kiyim - shaxs tomonidan ishlatiladigan va utilitar va estetik funktsiyalarni bajaradigan mahsulot yoki mahsulotlar to&#39;plami.</p>	<p><strong>Оде́жда</strong>&nbsp;&mdash;&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%98%D0%B7%D0%B4%D0%B5%D0%BB%D0%B8%D0%B5" title="Изделие">изделие</a>&nbsp;или совокупность изделий, надеваемых&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%A7%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA" title="Человек">человеком</a>&nbsp;и несущих утилитарные и эстетические функции.</p>	<p>Clothing - a product or a set of products worn by a person and carrying utilitarian and aesthetic functions.</p>	clothing	\N	7	14	\N	pW6dPLzFxhgjve7UhN3UFx20C1k6xcDPQAAUciwU.jpg	7889ldmdG2NbUWxF5K1aIrmscyD0O6Dl7Imoiyax.png	1	1	2020-11-25 09:37:28	2020-11-25 09:37:28
7	Shimlar	Брюки	Pants	<p>Onlaynda bepul etkazib beriladigan shim</p>	<p>Брюки с бесплатной доставкой в интернет-магазине</p>	<p>Trousers with free shipping online</p>	pants	\N	12	13	4	8UMN8FGoONL17ZAuilkRR1t7AaR3tZDj0JZ89haa.jpg	27R8udxm9PjYZMj5Bz73aZ69OJ0yqWLdQHiSzp0P.png	1	1	2020-11-25 09:49:17	2020-11-25 09:49:17
11	Smartfonlar	Смартфоны	Smartphones	<p>Smartfon - bu uyali aloqa vositalarini birlashtirgan mobil qurilma</p>	<p>Смартфон - это мобильное устройство, сочетающее в себе сотовую</p>	<p>A&nbsp;<em>smartphone</em>&nbsp;is a mobile device that combines cellular&nbsp;</p>	smartphones	\N	21	26	\N	bUTFSrmRmEXHrkM6OaFjnow1Vg1301ut9ZTBEfk1.jpg	kTDzgyRBVCblUDoRhw4td7zhEH2SG0M5Ynk8IpiZ.png	1	1	2020-11-25 10:07:03	2020-11-25 10:07:03
9	Kir yuvish mashinasi	Стиральная машина	Wash machine	<p>Kir yuvish mashinasi - bu kir yuvish uchun ishlatiladigan maishiy texnika</p>	<p>Стиральная машина - это бытовой прибор, используемый для стирки белья.</p>	<p>A&nbsp;<em>washing machine</em>&nbsp;is a home appliance used to wash laundry</p>	wash_machine	\N	16	17	8	4SlZErCltrqTGwq4gF0oJt6gom7ncES9g59xAmu0.jpg	z1S8fuxqIt7DIsOFTNJnW6vUbA0YXRLeqmeCD9tn.png	1	1	2020-11-25 09:59:55	2020-11-25 10:01:35
8	Maishiy texnikalar	Бытовая техника	Home appliences	<p>Katta maishiy texnika sotib oling</p>	<p>Приобретайте крупную&nbsp;<em>бытовую технику</em>&nbsp;для дома&nbsp;</p>	<p>Buy large household appliances for your home</p>	home_technics	\N	15	20	\N	nB4lrwBzMaA8KuWdtXC11WQc3z3SGdAQg7x1GyJ8.jpg	YyJ5SVRnWnGbxKI3sUlKwiJ6ugXYoJZwF8JFfq4D.png	1	1	2020-11-25 09:55:48	2020-11-25 09:55:48
10	Chang yutgich	Пылесос	Vacuum cleaner	<p>Chang yutgich Internetda arzon narxlarda</p>	<p>Пылесос онлайн по низким ценам</p>	<p>Vacuum Cleaner online at low prices</p>	vacuum_cleaner	\N	18	19	8	NjqcQuamijzWK6aEWNtGL57GlwvRC3vxvkWvgBE7.jpg	z1JXRMgfzDLi9aMRNbxLPWBxVKQVqzHOJ2DFDEBz.png	1	1	2020-11-25 10:04:09	2020-11-25 10:04:09
12	Telefonlar	Телефоны	Phones	<p>Sotib olish uchun yangi telefonlarni onlayn xarid qiling</p>	<p>Покупайте новые телефоны в Интернете, чтобы покупать</p>	<p>Shop new phones online to buy</p>	phones	\N	22	23	11	IgXlxbvMqacuPai9XM5bTbTJDUZGVE0Xd93c9oNa.jpg	HdKuNQT0qA2WVqHmw5lysxy7k4hHdZFjkqHnpWuF.png	1	1	2020-11-25 10:11:58	2020-11-25 10:11:58
13	Planshet	Планшет	Tablet	<p>Odatda planshetga qisqartirilgan planshet kompyuter mobil qurilmadir</p>	<p>Планшетный компьютер, обычно сокращенно планшет, - это мобильное устройство.</p>	<p>A&nbsp;<em>tablet</em>&nbsp;computer, commonly shortened to&nbsp;<em>tablet</em>, is a mobile device</p>	tablet	\N	24	25	11	pfrYbhyO7jdESSE1T3IPkzc9ezZH5liiAGZ6rK2e.jpg	cJkINyfDWZNLrXhA9U3YqMC3Y66wYmqj6OnqvoIo.png	1	1	2020-11-25 10:15:09	2020-11-25 10:15:09
16	Monobloklar	Моноблоки	Monoblocks	<p>Monobloklar - bu qiziqarli kompyuter</p>	<p>Моноблоки - забавный компьютер</p>	<p>Monoblocks is a fun computer</p>	monoblocks	\N	30	31	14	lKSRsKMEyVcttijJdUmB1hu1QuQZ4xz9tVSG1jWS.jpg	Wf2DTftl9DMF9EiTUehuC9FeI66HPFLkpopjowqh.png	1	1	2020-11-25 10:34:04	2020-11-25 10:34:04
17	Statsionar kompyuter	Настольный компьютер	Desktop computer	<p>Statsionar kompyuterlarni sotib oling</p>	<p>Купить настольные компьютеры</p>	<p>Buy&nbsp;<em>desktop computers</em></p>	desktop_computer	\N	32	33	14	iwf5WXKKt9wbOjmpPu0Rn4OKZwP0exRRkIgQYAa0.jpg	5TqgaCHuZPZpeUITUwgIxtoyw7w3uRtuSQvhO1NB.png	1	1	2020-11-25 10:38:52	2020-11-25 10:38:52
\.


--
-- Data for Name: delivery_methods; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.delivery_methods (id, name_uz, name_ru, name_en, description_uz, description_ru, description_en, cost, min_weight, max_weight, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: discounts; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.discounts (id, name_uz, name_ru, name_en, description_uz, description_ru, description_en, start_date, end_date, category_id, common, status, photo, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_000001_create_profiles_table	1
3	2014_10_12_100000_create_password_resets_table	1
4	2019_08_19_000000_create_failed_jobs_table	1
5	2020_04_15_175148_create_categories_table	1
6	2020_04_15_175201_create_brands_table	1
7	2020_04_15_175208_create_shop_marks_table	1
8	2020_04_15_175217_create_payments_table	1
9	2020_04_15_175224_create_stores_table	1
10	2020_04_15_175230_create_store_payments_table	1
11	2020_04_15_175244_create_store_users_table	1
12	2020_04_15_175254_create_store_categories_table	1
13	2020_04_15_175302_create_store_marks_table	1
14	2020_04_15_175317_create_shop_products_table	1
15	2020_04_15_175329_create_shop_photos_table	1
16	2020_04_15_175354_add_main_photo_id_to_shop_products_table	1
17	2020_04_15_175414_create_shop_product_categories_table	1
18	2020_04_15_175428_create_shop_product_marks_table	1
19	2020_04_15_175438_create_shop_characteristic_groups_table	1
20	2020_04_15_175448_create_shop_characteristics_table	1
21	2020_04_15_175450_create_shop_characteristic_categories_table	1
22	2020_04_15_175455_create_shop_values_table	1
23	2020_04_15_175503_create_shop_modifications_table	1
24	2020_04_15_175516_create_shop_carts_table	1
25	2020_04_15_175539_create_delivery_methods_table	1
26	2020_04_15_175539_create_shop_delivery_methods_table	1
27	2020_04_15_175543_create_store_delivery_methods_table	1
28	2020_04_15_175547_create_shop_orders_table	1
29	2020_04_15_175555_create_shop_order_items_table	1
30	2020_04_15_175606_create_shop_product_reviews_table	1
31	2020_06_16_004440_create_blog_posts_table	1
32	2020_06_17_155340_create_blog_news_table	1
33	2020_06_22_153348_create_blog_videos_table	1
34	2020_06_23_100120_create_banners_table	1
35	2020_07_06_075250_create_sliders_table	1
36	2020_09_27_213318_create_shop_category_brands_table	1
37	2020_10_10_213318_create_discounts_table	1
38	2020_11_04_175244_create_user_favorites_table	1
39	2020_11_13_174033_create_pages_table	1
40	2020_11_20_113517_drop_password_resets_table	2
41	2020_11_23_143634_add_networks_auth	3
42	2020_11_23_175234_create_shop_discounts_table	3
43	2020_11_24_160939_create_shop_product_discounts_table	3
44	2020_11_24_173147_add_manager_request_status_to_users_table	4
\.


--
-- Data for Name: pages; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.pages (id, title_uz, title_ru, title_en, menu_title_uz, menu_title_ru, menu_title_en, slug, description_uz, description_ru, description_en, body_uz, body_ru, body_en, parent_id, "left", "right", created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: payments; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.payments (id, name_uz, name_ru, name_en, logo, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: profiles; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.profiles (user_id, first_name, last_name, birth_date, gender, address, avatar) FROM stdin;
1	Admin	Adminov	1988-04-21	2	Address uz adress uz address address uz	\N
2	User	User	1987-05-22	2	User Address uz adress uz address address uz	\N
\.


--
-- Data for Name: shop_carts; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_carts (id, user_id, product_id, modification_id, quantity, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_category_brands; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_category_brands (category_id, brand_id) FROM stdin;
\.


--
-- Data for Name: shop_characteristic_categories; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_characteristic_categories (characteristic_id, category_id) FROM stdin;
\.


--
-- Data for Name: shop_characteristic_groups; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_characteristic_groups (id, name_uz, name_ru, name_en, "order", created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_characteristics; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_characteristics (id, name_uz, name_ru, name_en, group_id, status, type, "default", required, variants, hide_in_filters, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_delivery_methods; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_delivery_methods (id, name_uz, name_ru, name_en, cost, min_weight, max_weight, sort, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_discounts; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_discounts (id, store_id, discount_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_marks; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_marks (id, name_uz, name_ru, name_en, slug, photo, meta_json, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_modifications; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_modifications (id, product_id, name_uz, name_ru, name_en, code, characteristic_id, price_uzs, price_usd, type, value, color, photo, sort, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_order_items; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_order_items (id, order_id, product_id, modification_id, product_name_uz, product_name_ru, product_name_en, product_code, modification_name_uz, modification_name_ru, modification_name_en, modification_code, price, quantity, discount, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_orders; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_orders (id, user_id, delivery_method_id, delivery_method_name_uz, delivery_method_name_ru, delivery_method_name_en, delivery_cost, payment_type_id, total_cost, note, status, cancel_reason, statuses_json, phone, name, delivery_index, delivery_address, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_photos; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_photos (id, product_id, file, sort, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_product_categories; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_product_categories (product_id, category_id) FROM stdin;
\.


--
-- Data for Name: shop_product_discounts; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_product_discounts (id, product_id, discount_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_product_marks; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_product_marks (product_id, mark_id) FROM stdin;
\.


--
-- Data for Name: shop_product_reviews; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_product_reviews (id, product_id, rating, advantages, disadvantages, comment, user_id, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: shop_products; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_products (id, name_uz, name_ru, name_en, description_uz, description_ru, description_en, slug, price_uzs, price_usd, discount, discount_ends_at, main_category_id, store_id, brand_id, status, weight, quantity, guarantee, bestseller, new, rating, number_of_reviews, reject_reason, created_by, updated_by, created_at, updated_at, main_photo_id) FROM stdin;
\.


--
-- Data for Name: shop_values; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_values (product_id, characteristic_id, value, main, sort) FROM stdin;
\.


--
-- Data for Name: sliders; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.sliders (id, url, sort, file, created_by, updated_by, created_at, updated_at) FROM stdin;
1	http://shop.sec.uz/	1	45rRKXChjhQqeHzGIQdHnKVdqnCZ2WUmTeMQSwpf.png	1	1	2020-11-19 17:44:55	2020-11-19 17:44:55
2	http://shop.sec.uz/images/	1	lEspLsfxsq7OLSCkfFkom7VoA8OMsRD8W15Af5RN.png	1	1	2020-11-19 18:12:04	2020-11-19 18:12:04
3	http://shop.sec.uz/	3	xpvvbmtr2fqTcCFtjZTGMsfEaYpgl4If32T2cgjT.png	1	1	2020-11-20 10:19:37	2020-11-20 10:19:37
4	http://shop.sec.uz/	4	x7gRwTkaKCmdK6FoUOXMfpAQfepFl8ft15momF0J.png	1	1	2020-11-20 10:19:59	2020-11-20 10:19:59
5	http://shop.sec.uz/	5	s4Q2Z4SOSbVIfIgaorlm2WNaszGbDeggNIUB87f0.png	1	1	2020-11-20 10:20:21	2020-11-20 10:20:21
6	http://shop.sec.uz/	6	VCecsDIV6rBjV7n2XMy8ER2dzJ97THX6zrW9NgLL.png	1	1	2020-11-20 10:20:41	2020-11-20 10:20:41
\.


--
-- Data for Name: store_categories; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.store_categories (store_id, category_id) FROM stdin;
\.


--
-- Data for Name: store_delivery_methods; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.store_delivery_methods (store_id, delivery_method_id, cost, sort) FROM stdin;
\.


--
-- Data for Name: store_marks; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.store_marks (store_id, mark_id) FROM stdin;
\.


--
-- Data for Name: store_payments; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.store_payments (store_id, payment_id) FROM stdin;
\.


--
-- Data for Name: store_users; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.store_users (store_id, user_id, role) FROM stdin;
\.


--
-- Data for Name: stores; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.stores (id, name_uz, name_ru, name_en, slug, logo, status, created_by, updated_by, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: user_favorites; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.user_favorites (user_id, product_id) FROM stdin;
\.


--
-- Data for Name: user_networks; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.user_networks (user_id, network, identity, emails_json, phones_json) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.users (id, name, email, phone, phone_verified, password, balance, verify_token, phone_verify_token, phone_verify_token_expire, phone_auth, role, status, email_verified_at, remember_token, created_at, updated_at, manager_request_status) FROM stdin;
2	user	user@gmail.com	998991234567	f	$2y$10$wc9c1EJjS5Ip3rCa4oE0pujvxflEgUlTJYyc1./zcye9CeBJrU4ZO	0	\N	\N	\N	f	user	9	2020-11-18 14:20:41	2hAYZFPzv7	\N	\N	0
1	admin	admin@gmail.com	\N	f	$2y$10$ryve6eiOgB05r2qA0FGQHOCwHRVCzb.aoHwdjwoRhZ1FIV89qpoMK	0	\N	\N	\N	f	administrator	9	2020-11-18 14:20:41	7ZPCILc2iBUl6KixIibq9i0md8f9lFfj675egKOciqKrHQrDB2SR1hxmO6Lj	\N	\N	0
\.


--
-- Name: banners_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.banners_id_seq', 1, false);


--
-- Name: blog_news_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.blog_news_id_seq', 1, false);


--
-- Name: blog_posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.blog_posts_id_seq', 12, true);


--
-- Name: blog_videos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.blog_videos_id_seq', 10, true);


--
-- Name: brands_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.brands_id_seq', 1, false);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.categories_id_seq', 27, true);


--
-- Name: delivery_methods_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.delivery_methods_id_seq', 1, false);


--
-- Name: discounts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.discounts_id_seq', 1, false);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.migrations_id_seq', 44, true);


--
-- Name: pages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.pages_id_seq', 1, false);


--
-- Name: payments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.payments_id_seq', 1, false);


--
-- Name: shop_carts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_carts_id_seq', 1, false);


--
-- Name: shop_characteristic_groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_characteristic_groups_id_seq', 1, false);


--
-- Name: shop_characteristics_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_characteristics_id_seq', 1, false);


--
-- Name: shop_delivery_methods_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_delivery_methods_id_seq', 1, false);


--
-- Name: shop_discounts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_discounts_id_seq', 1, false);


--
-- Name: shop_marks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_marks_id_seq', 1, false);


--
-- Name: shop_modifications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_modifications_id_seq', 1, false);


--
-- Name: shop_order_items_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_order_items_id_seq', 1, false);


--
-- Name: shop_orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_orders_id_seq', 1, false);


--
-- Name: shop_photos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_photos_id_seq', 1, false);


--
-- Name: shop_product_discounts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_product_discounts_id_seq', 1, false);


--
-- Name: shop_product_reviews_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_product_reviews_id_seq', 1, false);


--
-- Name: shop_products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_products_id_seq', 1, false);


--
-- Name: sliders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.sliders_id_seq', 6, true);


--
-- Name: stores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.stores_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.users_id_seq', 2, true);


--
-- Name: banners banners_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.banners
    ADD CONSTRAINT banners_pkey PRIMARY KEY (id);


--
-- Name: banners banners_slug_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.banners
    ADD CONSTRAINT banners_slug_unique UNIQUE (slug);


--
-- Name: blog_news blog_news_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_news
    ADD CONSTRAINT blog_news_pkey PRIMARY KEY (id);


--
-- Name: blog_posts blog_posts_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_posts
    ADD CONSTRAINT blog_posts_pkey PRIMARY KEY (id);


--
-- Name: blog_videos blog_videos_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_videos
    ADD CONSTRAINT blog_videos_pkey PRIMARY KEY (id);


--
-- Name: brands brands_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_pkey PRIMARY KEY (id);


--
-- Name: brands brands_slug_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_slug_unique UNIQUE (slug);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: categories categories_slug_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_slug_unique UNIQUE (slug);


--
-- Name: delivery_methods delivery_methods_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.delivery_methods
    ADD CONSTRAINT delivery_methods_pkey PRIMARY KEY (id);


--
-- Name: discounts discounts_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.discounts
    ADD CONSTRAINT discounts_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: pages pages_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_pkey PRIMARY KEY (id);


--
-- Name: payments payments_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_pkey PRIMARY KEY (id);


--
-- Name: profiles profiles_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.profiles
    ADD CONSTRAINT profiles_pkey PRIMARY KEY (user_id);


--
-- Name: shop_carts shop_carts_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_carts
    ADD CONSTRAINT shop_carts_pkey PRIMARY KEY (id);


--
-- Name: shop_category_brands shop_category_brands_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_category_brands
    ADD CONSTRAINT shop_category_brands_pkey PRIMARY KEY (brand_id, category_id);


--
-- Name: shop_characteristic_groups shop_characteristic_groups_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristic_groups
    ADD CONSTRAINT shop_characteristic_groups_pkey PRIMARY KEY (id);


--
-- Name: shop_characteristics shop_characteristics_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristics
    ADD CONSTRAINT shop_characteristics_pkey PRIMARY KEY (id);


--
-- Name: shop_delivery_methods shop_delivery_methods_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_delivery_methods
    ADD CONSTRAINT shop_delivery_methods_pkey PRIMARY KEY (id);


--
-- Name: shop_discounts shop_discounts_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_discounts
    ADD CONSTRAINT shop_discounts_pkey PRIMARY KEY (id);


--
-- Name: shop_marks shop_marks_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_marks
    ADD CONSTRAINT shop_marks_pkey PRIMARY KEY (id);


--
-- Name: shop_marks shop_marks_slug_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_marks
    ADD CONSTRAINT shop_marks_slug_unique UNIQUE (slug);


--
-- Name: shop_modifications shop_modifications_code_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_modifications
    ADD CONSTRAINT shop_modifications_code_unique UNIQUE (code);


--
-- Name: shop_modifications shop_modifications_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_modifications
    ADD CONSTRAINT shop_modifications_pkey PRIMARY KEY (id);


--
-- Name: shop_order_items shop_order_items_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_order_items
    ADD CONSTRAINT shop_order_items_pkey PRIMARY KEY (id);


--
-- Name: shop_orders shop_orders_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_orders
    ADD CONSTRAINT shop_orders_pkey PRIMARY KEY (id);


--
-- Name: shop_photos shop_photos_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_photos
    ADD CONSTRAINT shop_photos_pkey PRIMARY KEY (id);


--
-- Name: shop_product_categories shop_product_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_categories
    ADD CONSTRAINT shop_product_categories_pkey PRIMARY KEY (product_id, category_id);


--
-- Name: shop_product_discounts shop_product_discounts_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_discounts
    ADD CONSTRAINT shop_product_discounts_pkey PRIMARY KEY (id);


--
-- Name: shop_product_marks shop_product_marks_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_marks
    ADD CONSTRAINT shop_product_marks_pkey PRIMARY KEY (product_id, mark_id);


--
-- Name: shop_product_reviews shop_product_reviews_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_reviews
    ADD CONSTRAINT shop_product_reviews_pkey PRIMARY KEY (id);


--
-- Name: shop_product_reviews shop_product_reviews_product_id_user_id_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_reviews
    ADD CONSTRAINT shop_product_reviews_product_id_user_id_unique UNIQUE (product_id, user_id);


--
-- Name: shop_products shop_products_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_pkey PRIMARY KEY (id);


--
-- Name: shop_products shop_products_slug_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_slug_unique UNIQUE (slug);


--
-- Name: shop_values shop_values_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_values
    ADD CONSTRAINT shop_values_pkey PRIMARY KEY (product_id, characteristic_id);


--
-- Name: sliders sliders_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.sliders
    ADD CONSTRAINT sliders_pkey PRIMARY KEY (id);


--
-- Name: store_categories store_categories_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_categories
    ADD CONSTRAINT store_categories_pkey PRIMARY KEY (store_id, category_id);


--
-- Name: store_delivery_methods store_delivery_methods_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_delivery_methods
    ADD CONSTRAINT store_delivery_methods_pkey PRIMARY KEY (store_id, delivery_method_id);


--
-- Name: store_marks store_marks_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_marks
    ADD CONSTRAINT store_marks_pkey PRIMARY KEY (store_id, mark_id);


--
-- Name: store_payments store_payments_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_payments
    ADD CONSTRAINT store_payments_pkey PRIMARY KEY (store_id, payment_id);


--
-- Name: store_users store_users_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_users
    ADD CONSTRAINT store_users_pkey PRIMARY KEY (store_id, user_id);


--
-- Name: store_users store_users_user_id_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_users
    ADD CONSTRAINT store_users_user_id_unique UNIQUE (user_id);


--
-- Name: stores stores_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.stores
    ADD CONSTRAINT stores_pkey PRIMARY KEY (id);


--
-- Name: stores stores_slug_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.stores
    ADD CONSTRAINT stores_slug_unique UNIQUE (slug);


--
-- Name: user_favorites user_favorites_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.user_favorites
    ADD CONSTRAINT user_favorites_pkey PRIMARY KEY (user_id, product_id);


--
-- Name: user_networks user_networks_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.user_networks
    ADD CONSTRAINT user_networks_pkey PRIMARY KEY (user_id, identity);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_name_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_name_unique UNIQUE (name);


--
-- Name: users users_phone_unique; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_phone_unique UNIQUE (phone);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: banners banners_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.banners
    ADD CONSTRAINT banners_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: banners banners_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.banners
    ADD CONSTRAINT banners_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: banners banners_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.banners
    ADD CONSTRAINT banners_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: blog_news blog_news_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_news
    ADD CONSTRAINT blog_news_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: blog_news blog_news_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_news
    ADD CONSTRAINT blog_news_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: blog_news blog_news_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_news
    ADD CONSTRAINT blog_news_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: blog_posts blog_posts_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_posts
    ADD CONSTRAINT blog_posts_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: blog_posts blog_posts_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_posts
    ADD CONSTRAINT blog_posts_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: blog_posts blog_posts_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_posts
    ADD CONSTRAINT blog_posts_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: blog_videos blog_videos_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_videos
    ADD CONSTRAINT blog_videos_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: blog_videos blog_videos_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_videos
    ADD CONSTRAINT blog_videos_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: blog_videos blog_videos_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.blog_videos
    ADD CONSTRAINT blog_videos_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: brands brands_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: brands brands_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.brands
    ADD CONSTRAINT brands_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: categories categories_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: categories categories_parent_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_parent_id_foreign FOREIGN KEY (parent_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: categories categories_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: delivery_methods delivery_methods_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.delivery_methods
    ADD CONSTRAINT delivery_methods_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: delivery_methods delivery_methods_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.delivery_methods
    ADD CONSTRAINT delivery_methods_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: discounts discounts_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.discounts
    ADD CONSTRAINT discounts_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: discounts discounts_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.discounts
    ADD CONSTRAINT discounts_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: discounts discounts_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.discounts
    ADD CONSTRAINT discounts_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: pages pages_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: pages pages_parent_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_parent_id_foreign FOREIGN KEY (parent_id) REFERENCES public.pages(id) ON DELETE RESTRICT;


--
-- Name: pages pages_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.pages
    ADD CONSTRAINT pages_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: payments payments_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: payments payments_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: profiles profiles_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.profiles
    ADD CONSTRAINT profiles_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: shop_carts shop_carts_modification_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_carts
    ADD CONSTRAINT shop_carts_modification_id_foreign FOREIGN KEY (modification_id) REFERENCES public.shop_modifications(id) ON DELETE RESTRICT;


--
-- Name: shop_carts shop_carts_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_carts
    ADD CONSTRAINT shop_carts_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id) ON DELETE RESTRICT;


--
-- Name: shop_carts shop_carts_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_carts
    ADD CONSTRAINT shop_carts_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_category_brands shop_category_brands_brand_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_category_brands
    ADD CONSTRAINT shop_category_brands_brand_id_foreign FOREIGN KEY (brand_id) REFERENCES public.brands(id) ON DELETE RESTRICT;


--
-- Name: shop_category_brands shop_category_brands_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_category_brands
    ADD CONSTRAINT shop_category_brands_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: shop_characteristic_categories shop_characteristic_categories_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristic_categories
    ADD CONSTRAINT shop_characteristic_categories_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: shop_characteristic_categories shop_characteristic_categories_characteristic_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristic_categories
    ADD CONSTRAINT shop_characteristic_categories_characteristic_id_foreign FOREIGN KEY (characteristic_id) REFERENCES public.shop_characteristics(id) ON DELETE RESTRICT;


--
-- Name: shop_characteristic_groups shop_characteristic_groups_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristic_groups
    ADD CONSTRAINT shop_characteristic_groups_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_characteristic_groups shop_characteristic_groups_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristic_groups
    ADD CONSTRAINT shop_characteristic_groups_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_characteristics shop_characteristics_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristics
    ADD CONSTRAINT shop_characteristics_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_characteristics shop_characteristics_group_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristics
    ADD CONSTRAINT shop_characteristics_group_id_foreign FOREIGN KEY (group_id) REFERENCES public.shop_characteristic_groups(id) ON DELETE RESTRICT;


--
-- Name: shop_characteristics shop_characteristics_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_characteristics
    ADD CONSTRAINT shop_characteristics_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_delivery_methods shop_delivery_methods_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_delivery_methods
    ADD CONSTRAINT shop_delivery_methods_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_delivery_methods shop_delivery_methods_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_delivery_methods
    ADD CONSTRAINT shop_delivery_methods_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_discounts shop_discounts_discount_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_discounts
    ADD CONSTRAINT shop_discounts_discount_id_foreign FOREIGN KEY (discount_id) REFERENCES public.discounts(id) ON DELETE RESTRICT;


--
-- Name: shop_discounts shop_discounts_store_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_discounts
    ADD CONSTRAINT shop_discounts_store_id_foreign FOREIGN KEY (store_id) REFERENCES public.stores(id) ON DELETE RESTRICT;


--
-- Name: shop_marks shop_marks_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_marks
    ADD CONSTRAINT shop_marks_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_marks shop_marks_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_marks
    ADD CONSTRAINT shop_marks_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_modifications shop_modifications_characteristic_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_modifications
    ADD CONSTRAINT shop_modifications_characteristic_id_foreign FOREIGN KEY (characteristic_id) REFERENCES public.shop_characteristics(id) ON DELETE RESTRICT;


--
-- Name: shop_modifications shop_modifications_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_modifications
    ADD CONSTRAINT shop_modifications_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_modifications shop_modifications_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_modifications
    ADD CONSTRAINT shop_modifications_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_order_items shop_order_items_modification_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_order_items
    ADD CONSTRAINT shop_order_items_modification_id_foreign FOREIGN KEY (modification_id) REFERENCES public.shop_modifications(id) ON DELETE RESTRICT;


--
-- Name: shop_order_items shop_order_items_order_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_order_items
    ADD CONSTRAINT shop_order_items_order_id_foreign FOREIGN KEY (order_id) REFERENCES public.shop_orders(id) ON DELETE RESTRICT;


--
-- Name: shop_order_items shop_order_items_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_order_items
    ADD CONSTRAINT shop_order_items_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id) ON DELETE RESTRICT;


--
-- Name: shop_orders shop_orders_delivery_method_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_orders
    ADD CONSTRAINT shop_orders_delivery_method_id_foreign FOREIGN KEY (delivery_method_id) REFERENCES public.delivery_methods(id) ON DELETE RESTRICT;


--
-- Name: shop_orders shop_orders_payment_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_orders
    ADD CONSTRAINT shop_orders_payment_type_id_foreign FOREIGN KEY (payment_type_id) REFERENCES public.payments(id) ON DELETE RESTRICT;


--
-- Name: shop_orders shop_orders_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_orders
    ADD CONSTRAINT shop_orders_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_photos shop_photos_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_photos
    ADD CONSTRAINT shop_photos_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_photos shop_photos_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_photos
    ADD CONSTRAINT shop_photos_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_product_categories shop_product_categories_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_categories
    ADD CONSTRAINT shop_product_categories_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: shop_product_categories shop_product_categories_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_categories
    ADD CONSTRAINT shop_product_categories_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id) ON DELETE RESTRICT;


--
-- Name: shop_product_discounts shop_product_discounts_discount_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_discounts
    ADD CONSTRAINT shop_product_discounts_discount_id_foreign FOREIGN KEY (discount_id) REFERENCES public.discounts(id) ON DELETE RESTRICT;


--
-- Name: shop_product_discounts shop_product_discounts_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_discounts
    ADD CONSTRAINT shop_product_discounts_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id) ON DELETE RESTRICT;


--
-- Name: shop_product_marks shop_product_marks_mark_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_marks
    ADD CONSTRAINT shop_product_marks_mark_id_foreign FOREIGN KEY (mark_id) REFERENCES public.shop_marks(id) ON DELETE RESTRICT;


--
-- Name: shop_product_marks shop_product_marks_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_marks
    ADD CONSTRAINT shop_product_marks_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id) ON DELETE RESTRICT;


--
-- Name: shop_product_reviews shop_product_reviews_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_reviews
    ADD CONSTRAINT shop_product_reviews_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id) ON DELETE RESTRICT;


--
-- Name: shop_product_reviews shop_product_reviews_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_product_reviews
    ADD CONSTRAINT shop_product_reviews_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_products shop_products_brand_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_brand_id_foreign FOREIGN KEY (brand_id) REFERENCES public.brands(id) ON DELETE RESTRICT;


--
-- Name: shop_products shop_products_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_products shop_products_main_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_main_category_id_foreign FOREIGN KEY (main_category_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: shop_products shop_products_main_photo_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_main_photo_id_foreign FOREIGN KEY (main_photo_id) REFERENCES public.shop_photos(id) ON DELETE RESTRICT;


--
-- Name: shop_products shop_products_store_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_store_id_foreign FOREIGN KEY (store_id) REFERENCES public.stores(id) ON DELETE RESTRICT;


--
-- Name: shop_products shop_products_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_products
    ADD CONSTRAINT shop_products_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: shop_values shop_values_characteristic_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_values
    ADD CONSTRAINT shop_values_characteristic_id_foreign FOREIGN KEY (characteristic_id) REFERENCES public.shop_characteristics(id) ON DELETE RESTRICT;


--
-- Name: shop_values shop_values_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.shop_values
    ADD CONSTRAINT shop_values_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id) ON DELETE RESTRICT;


--
-- Name: sliders sliders_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.sliders
    ADD CONSTRAINT sliders_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: sliders sliders_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.sliders
    ADD CONSTRAINT sliders_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: store_categories store_categories_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_categories
    ADD CONSTRAINT store_categories_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE RESTRICT;


--
-- Name: store_categories store_categories_store_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_categories
    ADD CONSTRAINT store_categories_store_id_foreign FOREIGN KEY (store_id) REFERENCES public.stores(id) ON DELETE RESTRICT;


--
-- Name: store_delivery_methods store_delivery_methods_delivery_method_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_delivery_methods
    ADD CONSTRAINT store_delivery_methods_delivery_method_id_foreign FOREIGN KEY (delivery_method_id) REFERENCES public.delivery_methods(id) ON DELETE RESTRICT;


--
-- Name: store_delivery_methods store_delivery_methods_store_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_delivery_methods
    ADD CONSTRAINT store_delivery_methods_store_id_foreign FOREIGN KEY (store_id) REFERENCES public.stores(id) ON DELETE RESTRICT;


--
-- Name: store_marks store_marks_mark_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_marks
    ADD CONSTRAINT store_marks_mark_id_foreign FOREIGN KEY (mark_id) REFERENCES public.shop_marks(id) ON DELETE RESTRICT;


--
-- Name: store_marks store_marks_store_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_marks
    ADD CONSTRAINT store_marks_store_id_foreign FOREIGN KEY (store_id) REFERENCES public.stores(id) ON DELETE RESTRICT;


--
-- Name: store_payments store_payments_payment_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_payments
    ADD CONSTRAINT store_payments_payment_id_foreign FOREIGN KEY (payment_id) REFERENCES public.payments(id) ON DELETE RESTRICT;


--
-- Name: store_payments store_payments_store_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_payments
    ADD CONSTRAINT store_payments_store_id_foreign FOREIGN KEY (store_id) REFERENCES public.stores(id) ON DELETE RESTRICT;


--
-- Name: store_users store_users_store_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_users
    ADD CONSTRAINT store_users_store_id_foreign FOREIGN KEY (store_id) REFERENCES public.stores(id) ON DELETE RESTRICT;


--
-- Name: store_users store_users_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.store_users
    ADD CONSTRAINT store_users_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: stores stores_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.stores
    ADD CONSTRAINT stores_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: stores stores_updated_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.stores
    ADD CONSTRAINT stores_updated_by_foreign FOREIGN KEY (updated_by) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: user_favorites user_favorites_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.user_favorites
    ADD CONSTRAINT user_favorites_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.shop_products(id) ON DELETE RESTRICT;


--
-- Name: user_favorites user_favorites_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.user_favorites
    ADD CONSTRAINT user_favorites_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: user_networks user_networks_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: dev_shop
--

ALTER TABLE ONLY public.user_networks
    ADD CONSTRAINT user_networks_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

