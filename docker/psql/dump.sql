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
    updated_at timestamp(0) without time zone,
    type smallint NOT NULL
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
    required boolean NOT NULL,
    hide_in_filters boolean NOT NULL,
    created_by bigint NOT NULL,
    updated_by bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    main boolean
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
    name_uz character varying(255),
    name_ru character varying(255),
    name_en character varying(255),
    code character varying(255),
    characteristic_id bigint,
    price_uzs integer NOT NULL,
    price_usd double precision,
    value character varying(50),
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
    manager_request_status smallint DEFAULT '0'::smallint NOT NULL,
    email_verified boolean DEFAULT false NOT NULL
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

COPY public.banners (id, title_uz, title_ru, title_en, description_uz, description_ru, description_en, url, slug, category_id, status, file, created_by, updated_by, created_at, updated_at, type) FROM stdin;
1	Redmi 8	Redmi 8	Redmi 8	<p>Redmi 8</p>	<p>Redmi 8</p>	<p>Redmi 8</p>	http://shop.sec.uz/	redmi_8_discount	11	3	HVmyNpMMiFzR107s6bEjaUL6SJeXEYKw554u2FsY.png	1	1	2020-12-01 17:56:51	2020-12-01 17:56:51	1
2	sletat.ru	sletat.ru	sletat.ru	<p>sletat.ru</p>	<p>sletat.ru</p>	<p>sletat.ru</p>	http://shop.sec.uz/	sletat_ru	8	3	okPu68soRCtJmpKROO0l2ypL2A7Z7LmZvwtjKMqB.png	1	1	2020-12-01 18:12:42	2020-12-01 18:12:46	1
3	Adamas	Adamas	Adamas	<p>Adamas</p>	<p>Adamas</p>	<p>Adamas</p>	http://shop.sec.uz/	adamas	14	3	HCdiLgr6fzJCG9qU6Jm58ATBDCM8vtBrnLhFR8xy.png	1	1	2020-12-01 18:13:40	2020-12-01 18:13:40	1
4	Xiomi	Xiomi	Xiomi	<p>Xiomi</p>	<p>Xiomi</p>	<p>Xiomi</p>	http://shop.sec.uz/	xiomi	11	3	4Fy5gsnnJ7EGM6IGln7fDqe1KGye6IE5cH5g206e.png	1	1	2020-12-01 18:27:51	2020-12-01 18:27:56	3
5	MI	MI	MI	<p>MI</p>	<p>MI</p>	<p>MI</p>	http://shop.sec.uz/	mi_bannner	12	3	El3MOKAZhR9n8d3He5iEwIPesrmtvyNElFrzoqpH.png	1	1	2020-12-01 18:30:01	2020-12-01 18:30:33	3
6	Snickers	Snickers	Snickers	<p>Snickers</p>	<p>Snickers</p>	<p>Snickers</p>	http://shop.sec.uz/	snickers	19	3	tCJAUjKSNyHOWdBDd3FuaEQYLEYn0lbGs7Pc0f76.png	1	1	2020-12-01 18:33:13	2020-12-01 18:33:18	3
7	TVs	TVs	TVs	<p>TVs</p>	<p>TVs</p>	<p>TVs</p>	http://shop.sec.uz/	tvbanner	2	3	0i09eD5kiATxbx8yEwS1qY65cOppQg0zEtx39LYQ.png	1	1	2020-12-04 17:58:17	2020-12-04 17:58:17	3
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
9	Yangi konditsioner sotib olishdan oldin bilishingiz kerak bo'lgan hamma narsalar	Все, что вам нужно знать, прежде чем покупать новый кондиционер	Everything You Need to Know Before You Buy a New Air Conditioner	Issiq kunda konditsionerdan yaxshiroq narsa yo'q - va texnologiya tobora sovuqlashib bormoqda.	Нет ничего лучше, чем кондиционер в жаркий день - а технологии становятся все круче.	There's nothing better than air conditioning on a hot day — and the technology keeps getting cooler.	<p>Konditsionerlarning to&#39;rtta asosiy turi mavjud. Ular:</p>\r\n\r\n<p>1. Derazaga o&#39;rnatilgan konditsionerlar<br />\r\nKonditsionerning eng keng tarqalgan turi bu derazaga o&#39;rnatiladigan blok bo&#39;lib, u vaqtincha deraza ochilishida joylashgan. Agar sizning uyingiz o&#39;rtacha haroratli hududda joylashgan bo&#39;lsa, qo&#39;shimcha sovutish uchun faqat sovutish moslamasini yoki qo&#39;shimcha issiqlik uchun sovutish / isitish moslamasini sotib olishingiz mumkin. Agar siz shimolda yashasangiz, iliq ob-havo mavsumi oxirida birliklarni olib tashlash yaxshidir.</p>	<p>Существует четыре основных типа кондиционеров. Они есть:</p>\r\n\r\n<p>1. Оконные кондиционеры.<br />\r\nСамый распространенный тип кондиционера - это оконный блок, который временно располагается в оконном проеме. Вы можете купить блок только для охлаждения или блок для охлаждения / нагрева для дополнительного тепла, если ваш дом расположен в районе с умеренными температурами. Если вы живете на севере, хорошо убирать юнитов в конце теплого сезона.</p>	<p>There are four main types of air-conditioning units. They are:</p>\r\n\r\n<p>1. Window-mounted air conditioners<br />\r\nThe most common type of air conditioner is a window-mounted unit, which temporarily resides in a window opening. You can buy a cooling-only unit or a cooling/heating unit for supplemental heat if your home is located in an area with moderate temperatures. If you live in the north, it&#39;s good to remove units at the end of the warm weather season.</p>	1	3	Pgk0zFIL9Ti1OekjoOve39kIMz6swqYyT2llXEk4.jpg	qyQRfRZzM5KgYrNd5baxGGGlT6vUcd6PcmLXrLRM.mp4	1	1	2020-11-24 11:48:23	2020-12-10 18:10:29
4	Google Xaridlar reytingini qanday yaxshilash mumkin	Как улучшить свой рейтинг в Google Покупках	How To Improve Your Google Shopping Ranking	Google o'zining savdo-sotiq kampaniyasining xususiyatini ko'plab nomlar bilan - "do'kon oynasi", "hayot chizig'i" va "old eshikni kutib oluvchi" deb ataydi.	Google называет свою торговую кампанию множеством названий - «витрина», «спасательный круг» и «встреча с входной дверью».	Google calls its Shopping campaign feature by many names- ‘shop window’, ‘lifeline’, and ‘front-door greeter’.	<p>Shunday qilib, Google Shopping reytingini yaxshilash uchun bu butun qidiruv reklama va raqamli marketing strategiyasini yaratish yoki buzish degani. Ammo reyting va optimallashtirishga kirishishdan oldin, Google Shopping nima ekanligini tushunish muhimdir.</p>\r\n\r\n<p>Google Merchant Center-ga bog&#39;langan ushbu vosita elektron tijorat biznesiga sizning reklamangizni mahsulot tasviri va mahsulot nomi bilan Google qidiruv tizimining natijalari sahifasining yuqori qismida va ba&#39;zi Google platformalarida ko&#39;rsatishga imkon beradi. Keyin foydalanuvchilar o&#39;zlari joylashgan sahifani yoki dasturni tark etmasdan mahsulotlarni qidirishlari, ko&#39;rishlari va taqqoslashlari mumkin. Agar ular ba&#39;zi bir mahsulot reklamalariga qiziqish bildirsalar, bosish orqali ularni reklama qilingan narsalarga qarab, ochilish sahifasi, toifalar sahifasi yoki singular mahsulot sahifasi - biznes veb-sayt sahifasiga olib boradi.</p>	<p>Само собой разумеется, что для повышения рейтинга Google Покупок нужно создать или разрушить всю их стратегию поисковой рекламы и цифрового маркетинга. Но прежде чем переходить к ранжированию и оптимизации, важно понять, что такое Google Покупки.</p>\r\n\r\n<p>Этот инструмент, связанный с Google Merchant Center, позволяет предприятиям электронной коммерции показывать вашу рекламу с изображением продукта и названием продукта в верхней части страницы результатов поиска Google и на определенных платформах Google. После этого пользователи могут искать, просматривать и сравнивать продукты, не покидая страницу или приложение, в котором они работают. Если они заинтересованы в рекламе товаров, переход по клику приведет их на страницу бизнес-сайта - либо целевую страницу, страницу категории или страницу отдельного продукта, в зависимости от того, что рекламировалось.</p>	<p>It goes without saying, then, that to<a href="https://www.adnabu.com/improve-google-shopping-ranking?hsLang=en" rel="noopener" target="_blank">&nbsp;improve Google Shopping ranking</a>&nbsp;is to make or break their entire search ad and digital marketing strategy. But before getting into rankings and optimization, it is important to understand what Google Shopping is.<br />\r\n<br />\r\nThe tool, which links to&nbsp;<a href="https://www.google.com/retail/solutions/merchant-center/" rel="noopener" target="_blank">Google Merchant Center</a>, allows eCommerce businesses to show your ad, with the product image and product title, on the top of Google&rsquo;s search engine results page and across certain Google platforms. Users can then search, view, and compare products without having to leave the page or application they&rsquo;re on. If they&rsquo;re interested in some product ads, a click-through will lead them to the business website page- either a landing page, category page or singular product page, depending on what had been advertised.</p>	1	3	4JCVQNE81l5AfuHyTHMEAvL9iBTJzdDHpRFGrkV4.jpg	ooxnHzGm7vepjudPRyUbhRbelpLT0Wv83GFKE0yd.mp4	1	1	2020-11-24 11:18:46	2020-11-25 15:18:29
7	Eng yaxshi changyutgichni qanday tanlash mumkin	Как выбрать лучший пылесос	How to Choose the Best Vacuum Cleaner	Bozorda juda ko'p har xil turdagi changyutgichlar mavjudki, sizning ehtiyojlaringizga eng mos keladigan changyutgichni qanday tanlashni hal qilish chalkash bo'lishi mumkin.	На рынке так много разных типов пылесосов, что может возникнуть путаница при выборе пылесоса, который лучше всего соответствует вашим потребностям.	There are so many different types of vacuum cleaners on the market that it can be confusing to decide how to choose a vacuum cleaner that best fits your needs.	<p>Ushbu maqola sizning uyingiz uchun asosiy changyutgichni qanday tanlashga qaratilgan. Shunday qilib, qo&#39;l changyutgichlari, avtomobil changyutgichlari, nam / quruq changyutgichlar kabi maxsus yoki ikkilamchi changyutgichlarni chetga surib, ikkita asosiy turdagi changyutgichni tanlash mumkin: tik va qutilar.</p>\r\n\r\n<p>Diklar an&#39;anaviy ravishda AQSh va Buyuk Britaniyada changyutgichning eng sevimli turi bo&#39;lib kelgan. Evropada va dunyoning qolgan qismida qutilar tanlangan changyutgichdir.</p>\r\n\r\n<p>Odatda tik tirgaklar qo&#39;zg&#39;alishni ta&#39;minlash uchun aylanadigan cho&#39;tka rulosiga ega va assimilyatsiyani ta&#39;minlaydigan bitta motorga ega bo&#39;lishi mumkin, shuningdek aralashtirgich cho&#39;tkasini aylantiradi yoki ikkita dvigatelga ega bo&#39;lishi mumkin, biri assimilyatsiya qilish uchun, ikkinchisi esa cho&#39;tkani haydash uchun.</p>	<p>Эта статья посвящена тому, как выбрать первичный пылесос для дома. Таким образом, помимо специальных или вторичных пылесосов, таких как ручные пылесосы, автомобильные пылесосы, пылесосы для влажной / сухой уборки, есть два основных типа пылесосов на выбор: стойки и канистры.</p>\r\n\r\n<p>Вертикальные стойки традиционно были любимым типом пылесосов в США и Великобритании. В Европе и во всем мире канистры - предпочтительный пылесос.</p>\r\n\r\n<p>Стойки обычно имеют вращающийся щеточный валик для перемешивания и могут иметь один двигатель, который обеспечивает всасывание, а также вращает щетку мешалки, или могут иметь два двигателя: один для всасывания, а другой для привода щетки.</p>	<p>This article is focused on how to choose a primary vacuum cleaner for your home. So, setting aside specialty or secondary vacuum cleaners, such as hand vacuums, car vacuums, wet/dry vacuums, there are two major types of vacuum cleaners to choose from: &nbsp;uprights and canisters.</p>\r\n\r\n<p>Uprights have traditionally been the favorite type of vacuum cleaner in the U.S. and Great Britain. In Europe and the rest of the world, canisters are the vacuum cleaner of choice.</p>\r\n\r\n<p>Uprights generally have a revolving brush roll to provide agitation and may have one motor that provides the suction and also turns the agitator brush, or it may have two motors, one to provide suction and one to drive the brush.</p>	10	3	c1jtb3u5XIh0ToJOuDNmUDHlzgvlny1v0y0AnoK3.jpg	SezsL89uDzjsAM4qzVFJOmC4I8z1XpS27CNZpEpw.mp4	1	1	2020-11-24 11:37:11	2020-11-25 15:21:05
10	Eng yaxshi konditsionerni qanday sotib olish mumkin	Как купить лучший кондиционер	How to buy the best air conditioner	Eng yaxshi konditsionerni tanlash qiyin bo'lishi mumkin. Sizga qanday o'lchamda kerak? Yugurish qancha turadi va u qanchalik shovqinli bo'ladi? Biz sizga uyingiz uchun mos modelni topishda yordam beramiz.	Выбор лучшего кондиционера может оказаться сложной задачей. Какой размер вам нужен? Сколько будет стоить работа и насколько шумно? Мы поможем вам подобрать подходящую модель для вашего дома.	Choosing the best air conditioner can be a challenge. What size do you need? How much will it cost to run and how noisy will it be? We'll help you find the right model for your home.	<p>Ular ikkita qismdan iborat: ichki blok va tashqi blok, sovutgich gazini o&#39;z ichiga olgan quvurlar bilan bog&#39;langan. Ular Avstraliyada eng keng tarqalgan konditsioner turidir va xona yoki ochiq maydon uchun taxminan 60m2 gacha yaxshi. Narxlari oralig&#39;i: $ 600 - $ 5500.</p>\r\n\r\n<p>Ko&#39;p bo&#39;linish<br />\r\nSplit-tizimga o&#39;xshaydi, lekin ikkita tashqi qurilmaga ulangan bitta tashqi blok bilan. Bir-biriga oqilona yaqin bo&#39;lgan ikkita yoki uchta xona uchun yaxshi, ayniqsa alohida split-tizimlar yoki kanalli tizim mos kelmasa. Ekvivalent alohida split-tizimlar bilan bir xil narx oralig&#39;ida.</p>	<p>Они состоят из двух частей: внутреннего блока и наружного блока, соединенных трубами с газообразным хладагентом. Они являются наиболее распространенным типом кондиционеров в Австралии и подходят для комнаты или открытой планировки площадью до 60 м2. Ценовой диапазон: 600-5500 долларов.</p>\r\n\r\n<p>Мульти-сплит<br />\r\nАналогично сплит-системе, но с одним наружным блоком, подключенным к двум или более внутренним блокам. Подходит для двух или трех комнат, которые расположены достаточно близко друг к другу, особенно когда отдельные сплит-системы или канальная система не подходят. Примерно в том же ценовом диапазоне, что и на аналогичные раздельные сплит-системы.</p>	<p>These have two parts: an indoor unit and an outdoor unit, connected by pipes containing refrigerant gas. They are the most common air conditioner type in Australia, and are good for a room or open plan area up to about 60m<sup>2</sup>. Price range: $600-$5500.</p>\r\n\r\n<h5>Multi-split</h5>\r\n\r\n<p><strong>Similar to a split-system, but with one outdoor unit connected to two or more indoor units. Good for two or three rooms that are reasonably close together, especially when separate split-systems or a ducted system aren&#39;t suitable. About the same price range as the equivalent separate split-systems.</strong></p>	1	3	BShJw2jVXxFYvBp75pZlDAbwzI9qYWrxWn5TqLuQ.jpg	JbRQ6O6ujmFggJqODlGqTKEGMi85XWwnaqqRljrs.mp4	1	1	2020-11-24 11:51:02	2020-11-25 15:22:52
\.


--
-- Data for Name: brands; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.brands (id, name_uz, name_ru, name_en, slug, logo, meta_json, created_by, updated_by, created_at, updated_at) FROM stdin;
15	Canon	Canon	Canon	canon	tvRVhkGXORbDDGplFH60wVSQXN0EAfN72jqRYevQ.jpg	\N	1	1	2020-12-10 12:05:52	2020-12-10 12:12:54
12	Acer	Acer	Acer	acer	rC0QzRJIq7oI1t7AqBRasYbcvGj7ZEcyl2TtF0IL.png	\N	1	1	2020-11-26 16:09:19	2020-11-26 16:11:52
1	Samsung	Samsung	Samsung	samsung	GSWGmroNmt5GNWwBova8pfnK1nTiYkD5wvXYjBC5.png	\N	1	1	2020-11-26 09:28:03	2020-12-01 16:52:45
2	Apple	Apple	Apple	apple	USMcgD2i0dRtiu8I5J3osw7RFbLQ5KYhM8tWp9KX.png	\N	1	1	2020-11-26 09:28:51	2020-12-01 16:53:49
3	MI	MI	MI	mi	TuvQtJaicnpwsyJJS2gWv2KZTjkH5zFxTG5ZyzYJ.png	\N	1	1	2020-11-26 09:29:18	2020-12-01 16:55:15
4	LG	LG	LG	lg	vCtJ2RSTU44reTzUysYzZCYV3mZYDo1qup9tTHtg.png	\N	1	1	2020-11-26 09:29:46	2020-12-01 16:58:06
5	Dolce gabbana	Dolce gabbana	Dolce gabbana	dolce_gabbana	cBur7wCHZgduMDLqXV9np7Iq7cgq6F5Y1bOiy6rz.png	\N	1	1	2020-11-26 09:30:30	2020-12-01 17:00:22
7	Sony	Sony	Sony	sony	jocHQlcyN3drIzYlCsdMRYJ8mQxT7bmSLJRKqY6r.png	\N	1	1	2020-11-26 09:31:19	2020-12-01 17:03:15
9	Chanel	Chanel	Chanel	chanel	1mPFXZcS6b2oAPbzM8oPmqoVeuQc0tC6qNYj4gqs.png	\N	1	1	2020-11-26 09:32:54	2020-12-01 17:04:48
6	Vitra	Vitra	Vitra	vitra	2HmOTbY1spp5wJpwh6Oph1UcJAxZqJAHWJYRwqyK.png	\N	1	1	2020-11-26 09:31:00	2020-12-01 17:06:13
10	Artel	Artel	Artel	artel	bO2mf4rlg4UDEre48xHoKExmfDSSTmDF8Cg6P4Pd.png	\N	1	1	2020-11-26 09:33:13	2020-12-01 17:08:02
11	Versage	Versage	Versage	versage	m4msT8fKxBewbh0giEyXc2yAfmZo8HvOu6HsQ6OK.png	\N	1	1	2020-11-26 09:33:42	2020-12-01 17:09:17
8	Zara	Zara	Zara	zara	TF7PC1bayQbnQObY1Kw2ksHz1tBZ3p5M79G5LLv1.png	\N	1	1	2020-11-26 09:32:28	2020-12-01 17:10:03
13	Adidas	Adidas	Adidas	Adidas	45vvFtYFgPD2pyoUAckNhfCop7k2Iop4vpDpjYDV.png	\N	1	1	2020-12-09 13:57:25	2020-12-09 14:04:10
14	Nike	Nike	Nike	nike	H0i62s9DsFChMeKURxN8It9u0A9rcQLmKvGLsbCZ.png	\N	1	1	2020-12-09 14:06:12	2020-12-09 14:08:05
16	Hp	Hp	Hp	hp	sXFyAYo3WjeFiHWYmi4K04nmJB5U9O69qjy5K8Mz.png	\N	1	1	2020-12-10 12:09:15	2020-12-10 12:09:15
17	Shivaki	Shivaki	Shivaki	shivaki	9BYqg6mozdtWoysYUDq1OyvTYavFqxvLTufFnW8c.png	\N	1	1	2020-12-10 12:09:48	2020-12-10 12:09:48
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.categories (id, name_uz, name_ru, name_en, description_uz, description_ru, description_en, slug, meta_json, "left", "right", parent_id, photo, icon, created_by, updated_by, created_at, updated_at) FROM stdin;
14	Komyuterlar	Компьютеры	Computers	<p>Kompyuter - bu kompyuter dasturlash orqali avtomatik ravishda arifmetik yoki mantiqiy operatsiyalar ketma-ketligini bajarishga buyruq beradigan mashina.</p>	<p>Компьютер - это машина, которой можно поручить автоматическое выполнение последовательностей арифметических или логических операций с помощью компьютерного программирования.</p>	<p>A&nbsp;<em>computer</em>&nbsp;is a machine that can be instructed to carry out sequences of arithmetic or logical operations automatically via&nbsp;<em>computer</em>&nbsp;programming.</p>	computers	\N	27	34	\N	EQTKJCAxneu49c6LLt5JLjcGT45XUNbedDrnrNPD.jpg	o4gKLamrljndVDkQLkZGqpdGMlvI2er4bpZNiUTr.png	1	1	2020-11-25 10:25:33	2020-12-01 10:02:04
23	O'yinlar	Игры	Games	<p>O&#39;yin - bu o&#39;yinning tuzilgan shakli</p>	<p>Игра - это структурированная форма игры</p>	<p>A game is a structured form of play</p>	games	\N	45	48	\N	hfSrTb8cahbjzYU58Hj4gk2PHnvDi3GZD1Pyboc6.jpg	4QCJi8VB8b29vO0B9LUKllfTwHNDRBkGv1cBGKnF.png	1	1	2020-11-25 11:16:47	2020-12-01 10:21:46
25	Foto va video	Фото и видео	Photo and video	<p>Foto va video bu yaxshi narsa</p>	<p>Фото и видео - вещь хорошая</p>	<p>Photo and video is a good thing</p>	photo_video	\N	49	54	\N	USFb76NfKFkgUM9psLj6zjt9cduScdyaVGZUi9iy.jpg	eqCkG4zWTM1FzcQBqsg1sW4HKfhkD1VDVboJKgy7.png	1	1	2020-11-25 11:23:32	2020-12-01 10:26:00
27	Video kamera	Видеокамера	Videocamera	<p>Videokamera sotib oling</p>	<p>Купить видеокамеру</p>	<p>Buy a videocamera</p>	videocamera	\N	52	53	25	qqmalO3T2oIZk0Pk2L0ImNVYhkVqeCM1CA8BGtKh.jpg	okhI4t8rEFB6Uca9hqCr4VQIFsJ3zUQbnSpXjmBw.png	1	1	2020-11-25 11:30:12	2020-12-01 10:28:41
15	Noutbuklar	Ноутбуки	Laptops	<p>Barcha yangi noutbuklarni xarid qiling</p>	<p>Покупайте все новые ноутбуки</p>	<p>Shop all new&nbsp;<em>laptops</em></p>	laptops	\N	28	29	14	gwRLYcDbDeMXzuQTZv1ak5lervKzsi36liv9pcw0.jpg	do4z0U7yjZricdXE91sLLJj22J6Gcc2SNSr0cdMi.png	1	1	2020-11-25 10:29:26	2020-12-01 10:03:40
19	Oshxona mebellari	Мебель для кухни	Kitchen furniture	<p>Oshxona mebellarini sotib oling</p>	<p>Купить кухонную мебель</p>	<p>Buy kitchen furniture</p>	kitchen_furniture	\N	36	37	18	Qa7GFuzs3KjxMMtR4ZAigCUeHaFWDBQtWW5LrTyr.jpg	cLU611tkPfZ1A5V8E6rNsHaiV1CproqIEp8rqRpc.png	1	1	2020-11-25 10:46:14	2020-12-01 10:12:04
21	Muzlatgich	Холодильник	Refrigerator	<p>Sovutgich sizning oshxonangizni ajratib turadi</p>	<p>Холодильник выделяет вашу кухню</p>	<p>A&nbsp;<em>refrigerator</em>&nbsp;sets your kitchen apart</p>	refrigerator	\N	40	41	18	NmSFOBg4dMaJlJeZeNrhJlAYycWFGAYYIqs6nuCN.jpg	d0fsmAtA6g8GGbvfS1k3N8wbmwBHZ6RmmybuywmH.png	1	1	2020-11-25 11:05:32	2020-12-01 10:18:17
4	Kiyim-kechak	Одежда	Clothing	<p>Kiyim - shaxs tomonidan ishlatiladigan va utilitar va estetik funktsiyalarni bajaradigan mahsulot yoki mahsulotlar to&#39;plami.</p>	<p><strong>Оде́жда</strong>&nbsp;&mdash;&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%98%D0%B7%D0%B4%D0%B5%D0%BB%D0%B8%D0%B5" title="Изделие">изделие</a>&nbsp;или совокупность изделий, надеваемых&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%A7%D0%B5%D0%BB%D0%BE%D0%B2%D0%B5%D0%BA" title="Человек">человеком</a>&nbsp;и несущих утилитарные и эстетические функции.</p>	<p>Clothing - a product or a set of products worn by a person and carrying utilitarian and aesthetic functions.</p>	clothing	\N	7	14	\N	fBf35VZqRcWZjLZUVW2RbvjRI4MzCf32rdKQdGQH.jpg	7889ldmdG2NbUWxF5K1aIrmscyD0O6Dl7Imoiyax.png	1	1	2020-11-25 09:37:28	2020-12-01 09:49:48
1	Televizorlar va dvd playerlar	Телевизоры и dvd-плейеры	TVs and dvd players	<p>Televizion (televizor), ba&#39;zan tele yoki telliga qisqartirilsa, harakatlanuvchi tasvirlarni monoxrom (qora va oq) yoki rangli va ikki yoki uch o&#39;lchovli va tovushli uzatishda ishlatiladigan telekommunikatsiya vositasidir. Bu atama televizor, televizion ko&#39;rsatuv yoki televidenie orqali uzatilishi mumkin.</p>	<p>Телевидение (ТВ), иногда сокращенно до теле или телик, представляет собой телекоммуникационную среду, используемую для передачи движущихся изображений в монохромном (черно-белом) или цветном, а также в двух или трех измерениях и звуке. Термин может относиться к телевизору, телешоу или телепередачам.</p>	<p><strong>Television</strong>&nbsp;(<strong>TV</strong>), sometimes shortened to tele or telly, is a telecommunication medium used for transmitting moving images in monochrome (black and white), or in color, and in two or three dimensions and sound. The term can refer to a&nbsp;<strong>television</strong>&nbsp;set, a&nbsp;<strong>television</strong>&nbsp;show, or the medium of&nbsp;<strong>television</strong>&nbsp;transmission.</p>	tvs_dvdplayers	\N	1	6	\N	HYu5XeSUreoJ73Mg6QQ0hslmXrojBHkHisSXfbEp.jpg	NQrUQFW9YonX23eP84adhpUQPl6v6vKn2J3OY9er.png	1	1	2020-11-23 11:55:53	2020-12-01 09:57:55
18	Oshxona	Кухня	Cookroom	<p>Oshpazlik uchun oshxona</p>	<p>Кухня или помещение для приготовления еды.</p>	<p>A kitchen or room for cookery.</p>	cookroom	\N	35	44	\N	reOgbZZafp1ZpJ7zhWCL7wug8YIe9dVDCz4nbdLs.jpg	yadY7MiCNJFNYFUqNvw3ShdpXyIUDZedLp9ow61j.png	1	1	2020-11-25 10:42:40	2020-12-01 10:10:45
20	Gaz plitalari	Газовые плиты	Gas stoves	<p>Gaz pechkasi - yonuvchan gaz bilan ta&#39;minlanadigan pechka</p>	<p>Газовая плита - это плита, которая работает на горючем газе.</p>	<p>A gas stove is a stove that is fuelled by combustible gas&nbsp;</p>	gas_stoves	\N	38	39	18	OstmVFu0SNdMXklmFRLBPgot9hTfMJxM7zXZyXY8.jpg	7mejoXXRMyLZMlf0K832GtWAU4fVYG5CDWkeIfeC.png	1	1	2020-11-25 10:57:55	2020-12-01 10:16:56
22	Blenderlar	Блендеры	Blenders	<p>Blender - bu faqat siz uchun moslama</p>	<p>Блендер - это именно то, что вам нужно</p>	<p>A blender is just the appliance for you</p>	blenders	\N	42	43	18	3deAcGRJyi78sspc9oUBwmhQsIJld8fm4pBbyrzt.jpg	JzEzoNHWBl5MiCtSjRMoCS6dik4rcarfNwxeMxAk.png	1	1	2020-11-25 11:12:04	2020-12-01 10:19:41
24	Playstation	Playstation	Playstation	<p>PlayStation is a &nbsp;video game brand</p>	<p>PlayStation - это бренд видеоигр</p>	<p>PlayStation is a &nbsp;video game brand</p>	playstation	\N	46	47	23	Q0ZyvE8x9JqxwnHtSedZLXGareaPQjxvPAU1ylDb.jpg	Q0wB3rUfwQrgAWboPyLB3bwDWUbK3yYhFDHaVSRD.png	1	1	2020-11-25 11:20:14	2020-12-01 10:23:06
26	FotoKamera	Фотокамера	Fotocamera	<p>Fotokamera sotib oling</p>	<p>Купить камеру</p>	<p>Buy a fotocamera</p>	fotocamera	\N	50	51	25	6q4jipThhVBx0hfcIDilmLLohoJ5hUv4NL2fNALf.jpg	yS68CIhUnqGaTexntQ5NEdiKzXfZvfmCgu6W56no.png	1	1	2020-11-25 11:27:55	2020-12-01 10:27:35
6	Ko'ylaklar	Платья	Dresses	<p>Ko&#39;ylaklar har qanday uslubda va o&#39;lchamda bo&#39;ladi</p>	<p>Рубашки бывают всех стилей и размеров.</p>	<p><em>Shirts</em>&nbsp;come in all styles and sizes</p>	shirts	\N	10	11	4	n5iMG6QbaNmxBsfeuZxNviruDpvcJo01omp8SRfD.jpg	SHNMyll41X5VGJJA8iYeuoPyBjdwxeg77prTzYEL.png	1	1	2020-11-25 09:45:23	2020-12-01 09:55:15
10	Chang yutgich	Пылесос	Vacuum cleaner	<p>Chang yutgich Internetda arzon narxlarda</p>	<p>Пылесос онлайн по низким ценам</p>	<p>Vacuum Cleaner online at low prices</p>	vacuum_cleaner	\N	18	19	8	6avGPzlGwmaNvvSX6KCfgNtKmaHdaGR3ildyf7WF.jpg	z1JXRMgfzDLi9aMRNbxLPWBxVKQVqzHOJ2DFDEBz.png	1	1	2020-11-25 10:04:09	2020-12-01 09:45:38
8	Maishiy texnikalar	Бытовая техника	Home appliences	<p>Katta maishiy texnika sotib oling</p>	<p>Приобретайте крупную&nbsp;<em>бытовую технику</em>&nbsp;для дома&nbsp;</p>	<p>Buy large household appliances for your home</p>	home_technics	\N	15	20	\N	ajhRPYtGMeG8Q9b27M1ot9vg7iw24yUzF2yLMMKv.jpg	YyJ5SVRnWnGbxKI3sUlKwiJ6ugXYoJZwF8JFfq4D.png	1	1	2020-11-25 09:55:48	2020-12-01 09:48:25
5	Oyoq kiyimlar	Oбувь	Shoes	<p>Poyafzal, etik, sandal, poshnali va boshqa ko&#39;plab narsalarni xarid qiling</p>	<p>Купите огромный выбор обуви, сапог, сандалий, каблуков и многого другого.</p>	<p>Shop a huge selection of&nbsp;<em>shoes</em>, boots, sandals, heels and more</p>	shoes	\N	8	9	4	BuBkBqw0zqYz7y1UzbnZho08D5YbCwN9SevDStYS.jpg	pYEMqGug7ybP5COXyAk0QhlAzve6JHpkW0NJzxsH.png	1	1	2020-11-25 09:41:53	2020-12-01 09:51:02
16	Monobloklar	Моноблоки	Monoblocks	<p>Monobloklar - bu qiziqarli kompyuter</p>	<p>Моноблоки - забавный компьютер</p>	<p>Monoblocks is a fun computer</p>	monoblocks	\N	30	31	14	tlAwZtzKM8WP5InyydiNmb6WrdoOS2ETRLFKnxKO.jpg	Wf2DTftl9DMF9EiTUehuC9FeI66HPFLkpopjowqh.png	1	1	2020-11-25 10:34:04	2020-12-01 10:04:50
17	Statsionar kompyuter	Настольный компьютер	Desktop computer	<p>Statsionar kompyuterlarni sotib oling</p>	<p>Купить настольные компьютеры</p>	<p>Buy&nbsp;<em>desktop computers</em></p>	desktop_computer	\N	32	33	14	E4luO4QXFgflzTbQ6FTwDdtSQyFeLJdhPlbBy05n.jpg	5TqgaCHuZPZpeUITUwgIxtoyw7w3uRtuSQvhO1NB.png	1	1	2020-11-25 10:38:52	2020-12-01 10:06:11
7	Shimlar	Брюки	Pants	<p>Onlaynda bepul etkazib beriladigan shim</p>	<p>Брюки с бесплатной доставкой в интернет-магазине</p>	<p>Trousers with free shipping online</p>	pants	\N	12	13	4	x9XIsDPaxz9VGN6AYiNFuTnr8KKS56UHr25HxNmz.jpg	27R8udxm9PjYZMj5Bz73aZ69OJ0yqWLdQHiSzp0P.png	1	1	2020-11-25 09:49:17	2020-12-01 09:56:42
12	Telefonlar	Телефоны	Phones	<p>Sotib olish uchun yangi telefonlarni onlayn xarid qiling</p>	<p>Покупайте новые телефоны в Интернете, чтобы покупать</p>	<p>Shop new phones online to buy</p>	phones	\N	22	23	11	MXCOC1Wazf4RpDyiJL2bUwMR31G9kkl6qEthltr2.jpg	HdKuNQT0qA2WVqHmw5lysxy7k4hHdZFjkqHnpWuF.png	1	1	2020-11-25 10:11:58	2020-12-01 09:43:58
11	Smartfonlar	Смартфоны	Smartphones	<p>Smartfon - bu uyali aloqa vositalarini birlashtirgan mobil qurilma</p>	<p>Смартфон - это мобильное устройство, сочетающее в себе сотовую</p>	<p>A&nbsp;<em>smartphone</em>&nbsp;is a mobile device that combines cellular&nbsp;</p>	smartphones	\N	21	26	\N	Ark1mnNzegzAsXh9GxtJQbhQWuujnihN9pG0Zwdc.jpg	kTDzgyRBVCblUDoRhw4td7zhEH2SG0M5Ynk8IpiZ.png	1	1	2020-11-25 10:07:03	2020-12-01 09:42:34
9	Kir yuvish mashinasi	Стиральная машина	Wash machine	<p>Kir yuvish mashinasi - bu kir yuvish uchun ishlatiladigan maishiy texnika</p>	<p>Стиральная машина - это бытовой прибор, используемый для стирки белья.</p>	<p>A&nbsp;<em>washing machine</em>&nbsp;is a home appliance used to wash laundry</p>	wash_machine	\N	16	17	8	R2JdDjW4sZHCWHcT59hWpnEFFQiNoxwHh5yV5eF8.jpg	z1S8fuxqIt7DIsOFTNJnW6vUbA0YXRLeqmeCD9tn.png	1	1	2020-11-25 09:59:55	2020-12-01 09:46:58
13	Planshet	Планшет	Tablet	<p>Odatda planshetga qisqartirilgan planshet kompyuter mobil qurilmadir</p>	<p>Планшетный компьютер, обычно сокращенно планшет, - это мобильное устройство.</p>	<p>A&nbsp;<em>tablet</em>&nbsp;computer, commonly shortened to&nbsp;<em>tablet</em>, is a mobile device</p>	tablet	\N	24	25	11	NpoqqSrj7kJpW0V5Ml9SAgGsFfq6Kyvp9EczsRtf.jpg	cJkINyfDWZNLrXhA9U3YqMC3Y66wYmqj6OnqvoIo.png	1	1	2020-11-25 10:15:09	2020-12-01 09:44:22
3	Dvd playerlar	Dvd-плейеры	Dvd players	<p>Televizion (televizor), ba&#39;zan tele yoki telliga qisqartirilsa, harakatlanuvchi tasvirlarni monoxrom (qora va oq) yoki rangli va ikki yoki uch o&#39;lchovli va tovushli uzatishda ishlatiladigan telekommunikatsiya vositasidir. Bu atama televizor, televizion ko&#39;rsatuv yoki televidenie orqali uzatilishi mumkin.</p>	<p>елевидение (ТВ), иногда сокращенно до теле или телик, представляет собой телекоммуникационную среду, используемую для передачи движущихся изображений в монохромном (черно-белом) или цветном, а также в двух или трех измерениях и звуке. Термин может относиться к телевизору, телешоу или телепередачам.</p>	<table>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>\r\n\t\t\t<p><strong>Television</strong>&nbsp;(<strong>TV</strong>), sometimes shortened to tele or telly, is a telecommunication medium used for transmitting moving images in monochrome (black and white), or in color, and in two or three dimensions and sound. The term can refer to a&nbsp;<strong>television</strong>&nbsp;set, a&nbsp;<strong>television</strong>&nbsp;show, or the medium of&nbsp;<strong>television</strong>&nbsp;transmission.</p>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>	dvd_players	\N	4	5	1	KBnE5ZaacwR5xzevbgr32rn6x3il0GDCKO9s66Ng.jpg	v0a5wDY1lPNiZCyg6QqtPVCkerFsyWlvrMHfpxLe.png	1	1	2020-11-25 09:17:49	2020-12-01 09:59:26
2	Televizorlar	Телевизоры	Televisions	<table>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>\r\n\t\t\t<p>Televizion (televizor), ba&#39;zan tele yoki telliga qisqartirilsa, harakatlanuvchi tasvirlarni monoxrom (qora va oq) yoki rangli va ikki yoki uch o&#39;lchovli va tovushli uzatishda ishlatiladigan telekommunikatsiya vositasidir. Bu atama televizor, televizion ko&#39;rsatuv yoki televidenie orqali uzatilishi mumkin.</p>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>	<table>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>\r\n\t\t\t<p>Телевидение (ТВ), иногда сокращенно до теле или телик, представляет собой телекоммуникационную среду, используемую для передачи движущихся изображений в монохромном (черно-белом) или цветном, а также в двух или трех измерениях и звуке. Термин может относиться к телевизору, телешоу или телепередачам.</p>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>	<table>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>\r\n\t\t\t<p><strong>Television</strong>&nbsp;(<strong>TV</strong>), sometimes shortened to tele or telly, is a telecommunication medium used for transmitting moving images in monochrome (black and white), or in color, and in two or three dimensions and sound. The term can refer to a&nbsp;<strong>television</strong>&nbsp;set, a&nbsp;<strong>television</strong>&nbsp;show, or the medium of&nbsp;<strong>television</strong>&nbsp;transmission.</p>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>	tvs	\N	2	3	1	BW1YaBx285kTOjuMuSn177VS8pWPzFT4eVQX5Yh0.png	02eSznquexKVjvQdkMuqkAZfOaDvoqX38IsjwUlu.png	1	1	2020-11-24 16:08:55	2020-12-04 18:06:43
\.


--
-- Data for Name: delivery_methods; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.delivery_methods (id, name_uz, name_ru, name_en, description_uz, description_ru, description_en, cost, min_weight, max_weight, created_by, updated_by, created_at, updated_at) FROM stdin;
1	Flesh delivery	Flesh delivery	Flesh delivery	<p>Flesh delivery -&nbsp;juda tez</p>	<p>Flesh delivery - очень быстро</p>	<p>Flesh delivery - very fast</p>	10000	0.5	20	1	1	2020-11-26 10:24:32	2020-11-26 10:29:36
\.


--
-- Data for Name: discounts; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.discounts (id, name_uz, name_ru, name_en, description_uz, description_ru, description_en, start_date, end_date, category_id, common, status, photo, created_by, updated_by, created_at, updated_at) FROM stdin;
9	Yig'ma chegirma	Скидка накопительная	Cumulative discount	<p>Hozirda chegirma turi juda mashhur. Har bir xarid paytida, ma&#39;lum bir foiz mijozning balansiga tushadi va keyinchalik u to&#39;lashi mumkin.</p>	<p>&nbsp;Довольно популярный сейчас вид скидки. С каждой покупки падает определённый процент на баланс клиента, которым в последствии он может расплатиться.</p>	<p>Discount type is quite popular now. With each purchase, a certain percentage falls on the client&#39;s balance, with which he can later pay.</p>	2020-12-12 00:00:00	2021-12-12 00:00:00	8	t	1	JMZfDjB67LHbX1SyNe0CiLFBdyH0FFA4SC3ukmPO.jpg	1	1	2020-11-26 13:30:42	2020-12-09 15:24:53
8	Ulgurji chegirma / katta miqdor	Скидка на опт/большую сумму	Wholesale discount / large amount	<p>Mijozdan sotib olish miqdori qancha ko&#39;p bo&#39;lsa, u shunchaki chegirma olishni xohlaydi. Siz marketing strategiyangizni ishlab chiqishda bu bilan o&#39;ynashingiz mumkin.</p>	<p>Чем больше сумма покупки у клиента, тем больше он будет хотеть получить скидку. Можете играть на этом при разработке своей стратеги в маркетинге.</p>	<p>The higher the purchase amount from the customer, the more he will want to get a discount. You can play with this when developing your marketing strategy.</p>	2020-12-12 00:00:00	2021-12-12 00:00:00	11	t	1	ZmEyr0hFh4XwiAo9FyuRMAb0qHmwuNtZDSThKHki.jpg	1	1	2020-11-26 13:28:08	2020-12-09 15:26:09
6	Oldindan buyurtma qilingan chegirma	Скидка на предварительный заказ	Pre-order discount	<p>Kimki oldinroq buyurtma bersa va shuning uchun pulni erta bersa, u katta chegirmaga ega. Sizning foydangiz juda oddiy - siz ushbu mahsulot uchun pul to&#39;laydigan pul olasiz.</p>	<p>Кто раньше заказывает, а следовательно и отдаёт деньги раньше, тот получает существенную скидку. Ваша прибыль крайне простая &ndash; Вы получаете деньги, которыми оплачиваете этот самый товар.</p>	<p>Whoever orders earlier, and therefore gives the money earlier, receives a substantial discount. Your profit is extremely simple - you get money with which you pay for this very product.</p>	2020-12-12 00:00:00	2021-12-12 00:00:00	19	t	1	ikI3zuK2XYJN8x7PL1nrdmBUTV4PMCpyNhXpwtn6.jpg	1	1	2020-11-26 13:23:42	2020-12-09 15:27:08
4	Istalgan davr uchun chegirma	Скидка на любой срок	Discount for any period	<p>Haftaning bir kuni yoki kuniga chegirmalarning analogi, faqat muddat har qanday bo&#39;lishi mumkin. Katta intervallarni o&#39;rnatmaslikni tavsiya qilaman. Foyda, har doimgidek, eng sodda - ochko&#39;zlikda.</p>	<p>Аналог скидок на один день или день недели, только срок может быть любой. Рекомендую не ставить большие интервалы. Выгода как всегда в самом простом &ndash; в жадности.</p>	<p>An analogue of discounts for one day or a day of the week, only the period can be any. I recommend not to set large intervals. The benefit, as always, is in the simplest - in greed.</p>	2020-12-12 00:00:00	2021-12-12 00:00:00	11	t	1	xA4AovNMOWDwd396LqmnNfCQxDiHzriQZN7E8Wem.jpg	1	1	2020-11-26 13:19:11	2020-12-09 15:29:45
3	Haftaning kunlari bo'yicha chegirma	Скидка по дням недели	Discount by days of the week	<p>Bir kunlik chegirma bilan deyarli bir xil, ammo haftaning ma&#39;lum bir kuniga bog&#39;liq.</p>	<p>Практически то же самое, что и скидка на один день, но привязывается к конкретному дню недели.</p>	<p>Almost the same as a one day discount, but tied to a specific day of the week.</p>	2020-12-12 00:00:00	2020-12-26 00:00:00	14	t	1	nmfMD0wNWYgGOrHrkSm56yKSQQiHVX12JGfChsVS.jpg	1	1	2020-11-26 13:15:30	2020-12-09 15:31:10
7	Magnit chegirma	Магнитная скидка	Magnetic discount	<p>Xaridlarning ma&#39;lum hajmiga yetganda, chegirma taqdim etiladi. Nima uchun magnit? Chunki u &quot;Top Magnet&quot; texnologiyasi bilan juda yaxshi ishlaydi.</p>	<p>При достижении определённого объема покупок предоставляется скидка. Почему магнитная? Потому что отлично работает с технологией &ldquo;<a href="https://in-scale.ru/blog/texnologiya-magnit-sverxu">Магнит сверху</a>&rdquo;.</p>	<p>Upon reaching a certain volume of purchases, a discount is provided. Why magnetic? Because it works great with the &ldquo;Top Magnet&rdquo; technology.</p>	2020-12-12 00:00:00	2020-12-31 00:00:00	14	t	1	cRgCOUvSmcayR1OtRsOTTwXDVtgE8BEl8IlOGMuj.jpg	1	1	2020-11-26 13:25:37	2020-12-09 15:32:44
2	Bir kunlik chegirma	Скидка на один день	One day discount	<p>Ajoyib ishlaydi, hatto ko&#39;pincha uni o&#39;zim sotib olaman. Biron bir mahsulotni tanlang va unga chegirma o&#39;rnating. Aytgancha, agar siz uni &quot;Faqat bugun&quot; narx yorlig&#39;i bilan ta&#39;kidlasangiz, unda mahsulot, ayniqsa, lokomotiv mahsuloti bo&#39;lsa, mukammal tarzda uchib ketadi.</p>	<p>Отлично работает, даже зачастую сам на нее покупаюсь. Выделяете какой-то товар и устанавливаете на него скидку. Кстати, если выделить ее ценником &ldquo;Только сегодня&rdquo;, то товар, особенно если это&nbsp;<a href="https://in-scale.ru/blog/a-chto-u-vas-v-kompanii-moloko-i-krevetki">товар-локомотив</a>, будет отлично разлетаться.</p>	<p>Works great, even often I buy it myself. Select some product and set a discount on it. By the way, if you highlight it with the price tag &quot;Only today&quot;, then the product, especially if it is a locomotive product, will fly off perfectly.</p>	2021-12-01 00:00:00	2021-12-01 00:00:00	4	t	1	SmyG9kz5RKK0jqKHla8Qw546Uk4JBW7l6PyixPdE.jpg	1	1	2020-11-26 13:10:02	2020-12-09 15:18:27
11	Bayram / tadbir uchun chegirma	Скидка на праздник/событие	Holiday / event discount	<p>Shahar kuni, Yangi yil, Rossiya kuni va har qanday professional bayramlar uchun.</p>	<p>День города, Новый год, День России, да на любые профессиональные праздники.</p>	<p>City Day, New Year, Russia Day, and for any professional holidays.</p>	2020-12-28 00:00:00	2021-01-03 00:00:00	11	t	1	CxkVOtG2N3bd5sMUwRcwp0dl217CNoQfGz4X9mCP.jpg	1	1	2020-11-26 13:34:53	2020-12-09 15:21:02
10	Naqd / naqd pulsiz to'lash uchun chegirma	Скидка за оплату наличными/безналичными	Discount for payment in cash / non-cash	<p>Biz hammamiz banklarni yoqtirmaymiz. Aksincha, unday emas. Aksariyat tadbirkorlarga bank kartalari orqali to&#39;lash yoqmaydi.</p>	<p>Мы все не любим банки. Вернее, не так. Большинство предпринимателей не любят оплату банковскими картами.</p>	<p>We all don&#39;t like banks. Or rather, not so. Most entrepreneurs don&#39;t like paying with bank cards.</p>	2020-12-12 00:00:00	2021-12-12 00:00:00	11	t	1	ZE4luLAor8TmI45oT6XIxnQzXMG3dMtvjnupJLxe.jpg	1	1	2020-11-26 13:32:34	2020-12-09 15:23:52
5	Muayyan mahsulot uchun chegirma	Скидка на конкретный товар	Discount for a specific product	<p>Mahsulot chegirmalari vaqt bilan cheklangan bo&#39;lishi mumkin (afzalroq), bo&#39;lmasligi mumkin. Ajoyib echim - &quot;Kunning mahsuloti&quot; ni narx yorlig&#39;i bilan ta&#39;kidlash (eski va yangi narxlar bilan).</p>	<p>Скидки на товар могут быть ограниченными по сроку (предпочтительней), могут нет. Отличное решение &ndash; выделить ценником &ldquo;Товар дня&rdquo; (со старой и новой ценой).</p>	<p>Product discounts may be limited in time (preferable), may not. An excellent solution is to highlight the &ldquo;Product of the Day&rdquo; with a price tag (with the old and new prices).</p>	2020-12-12 00:00:00	2021-12-12 00:00:00	15	t	1	6cvUgPcSurU3dfI8ND0qTb0TxvKXMFoK4zUXuTnf.jpg	1	1	2020-11-26 13:21:51	2020-12-09 15:28:20
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
45	2020_11_26_163433_add_email_verified_to_users_table	5
46	2020_12_01_135006_add_type_column_to_banners_table	6
47	2020_12_02_144403_remove_unique_key_from_store_users_table	7
48	2020_12_01_123130_delete_from_modifications	8
49	2020_12_02_100416_drop_table_shop_value	8
50	2020_12_03_140317_alter_modifications_name_table	8
51	2020_12_03_161421_delete_variant_and_default_from_characteristics	8
52	2020_12_04_155254_add_main_colum_to_characteristics	8
\.


--
-- Data for Name: pages; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.pages (id, title_uz, title_ru, title_en, menu_title_uz, menu_title_ru, menu_title_en, slug, description_uz, description_ru, description_en, body_uz, body_ru, body_en, parent_id, "left", "right", created_by, updated_by, created_at, updated_at) FROM stdin;
1	Matbuot markazi	Пресс-центр	Press-center	Matbuot markazi	Пресс-центр	Press-center	presscenter	Matbuot xizmati - bu tashkilot, davlat muassasasi yoki davlat organining matbuot va boshqa ommaviy axborot vositalari bilan o'zaro aloqador bo'linmasi. O'zaro aloqalar press-relizlarni chiqarish, matbuot anjumanlarini tashkil etish, telefon yoki Internet orqali maslahatlashuvlar orqali amalga oshiriladi. Matbuot bilan o'zaro aloqani bir kishi - tashkilotning matbuot kotibi va xizmatning barcha xodimlari amalga oshirishi mumkin.	Пресс-служба — подразделение организации, госучреждения или органа власти, осуществляющее взаимодействие данной структуры с прессой и прочими СМИ. Взаимодействие происходит посредством выпуска пресс-релизов, организации пресс-конференций, консультаций по телефону или интернету. Взаимодействие с прессой может осуществляться как одним лицом - пресс-секретарем организации, так и всеми сотрудниками службы.	Press service is a subdivision of an organization, state institution or government body that interacts with the press and other media outlets. Interaction takes place through the issuance of press releases, the organization of press conferences, consultations by phone or the Internet. Interaction with the press can be carried out both by one person - the press secretary of the organization, and by all employees of the service.	<p>Matbuot xizmatining tarkibiy bo&#39;linma sifatida maqsadi turli darajalarda &quot;kerakli vaqtda&quot; &quot;to&#39;g&#39;ri&quot; ma&#39;lumotlarni etkazishdir. Amaldagi tadbirlar o&#39;tkaziladigan joylarda matbuot xizmati sub-press markazlarini tuzishi, press attashega ega bo&#39;lishi mumkin. Bunday manzarani mezbon mamlakatning turli shaharlarida bo&#39;lib o&#39;tadigan Olimpiya o&#39;yinlarida ko&#39;rish mumkin. Shuningdek, xalqaro aloqalar, xorijiy vakolatxonalarga kirish huquqiga ega bo&#39;lgan tashkilotlarda press-attaşe mavjud (ko&#39;pincha bular maslahatchilar, xorijiy ommaviy axborot vositalari bilan aloqalar bo&#39;yicha mutaxassislar). [2]</p>\r\n\r\n<p>Matbuot xizmatining vazifalari<br />\r\nMatbuot xizmatining vazifalari:</p>\r\n\r\n<p>Siyosiy va iqtisodiy faoliyatni amalga oshirish bilan bog&#39;liq ijtimoiy-siyosiy xarakterdagi ma&#39;lumotlarni yig&#39;ish va tahlil qilish<br />\r\nIqtisodiy, siyosiy va ijtimoiy dasturlar va harakatlarni amalga oshirish jarayonida jamoatchilik fikri holati va dinamikasini monitoring qilish, tahlil qilish.<br />\r\nFederal va mintaqaviy davlat organlari faoliyatini yoritish va talqin qilish bo&#39;yicha mintaqaviy ommaviy axborot vositalarining faoliyatini tahlil qilish.<br />\r\nHam federal, ham mintaqaviy hokimiyat idoralarining iqtisodiy va ijtimoiy siyosatida tashabbuslar, siyosiy harakatlar, xarajatlarni amalga oshirish bilan bog&#39;liq holda mamlakatda, mintaqada sodir bo&#39;ladigan voqealarning ijtimoiy-siyosiy vaziyatini va mumkin bo&#39;lgan stsenariylarini prognoz qilish. [3]</p>	<p>Цель пресс-службы как структурного подразделения заключается в передаче &laquo;нужной&raquo; информации в &laquo;нужное время&raquo; на самых разных уровнях. На местах актуальных событий пресс-служба может создавать субпресс-центры, иметь пресс-атташе. Такую картину можно видеть на Олимпийских играх, которые проходят в различных городах страны-устроителя. Пресс-атташе есть и в организациях, имеющих выход на международные контакты, зарубежные представительства (часто это советники, эксперты по связям с иностранными СМИ).<sup><a href="https://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%B5%D1%81%D1%81-%D1%81%D0%BB%D1%83%D0%B6%D0%B1%D0%B0#cite_note-2">[2]</a></sup></p>\r\n\r\n<h2>Задачи пресс-службы[<a href="https://ru.wikipedia.org/w/index.php?title=%D0%9F%D1%80%D0%B5%D1%81%D1%81-%D1%81%D0%BB%D1%83%D0%B6%D0%B1%D0%B0&amp;veaction=edit&amp;section=3" title="Редактировать раздел «Задачи пресс-службы»">править</a>&nbsp;|&nbsp;<a href="https://ru.wikipedia.org/w/index.php?title=%D0%9F%D1%80%D0%B5%D1%81%D1%81-%D1%81%D0%BB%D1%83%D0%B6%D0%B1%D0%B0&amp;action=edit&amp;section=3" title="Редактировать раздел «Задачи пресс-службы»">править код</a>]</h2>\r\n\r\n<p>Задачами пресс-службы являются:</p>\r\n\r\n<ul>\r\n\t<li>Сбор и анализ информации социально-политического характера, связанной с осуществлением политической и экономической деятельности</li>\r\n\t<li>Мониторинг, анализ состояния и динамики общественного мнения в процессе осуществления экономических, политических и социальных программ и акций.</li>\r\n\t<li>Анализ деятельности региональных средств массовой информации по освещению и интерпретации деятельности федеральных и региональных органов государственного управления.</li>\r\n\t<li>Прогнозирование социально-политической ситуации и возможных сценариев развития событий в стране, регионе, в связи с реализацией инициатив, политических акций, расходов в экономической и социальной политике как федеральных, так и региональных органов власти.<sup><a href="https://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%B5%D1%81%D1%81-%D1%81%D0%BB%D1%83%D0%B6%D0%B1%D0%B0#cite_note-3">[3]</a></sup></li>\r\n</ul>	<p>The purpose of the press service as a structural unit is to convey the &quot;right&quot; information at the &quot;right time&quot; at various levels. At the places of current events, the press service can create sub-press centers, have a press attach&eacute;. Such a picture can be seen at the Olympic Games, which are held in various cities of the host country. There is also a press attach&eacute; in organizations that have access to international contacts, foreign missions (often these are advisers, experts in relations with foreign media). [2]</p>\r\n\r\n<p>Tasks of the press service<br />\r\nThe tasks of the press service are:</p>\r\n\r\n<p>Collection and analysis of information of a socio-political nature related to the implementation of political and economic activities<br />\r\nMonitoring, analysis of the state and dynamics of public opinion in the process of implementing economic, political and social programs and actions.<br />\r\nAnalysis of the activities of regional mass media on coverage and interpretation of the activities of federal and regional government bodies.<br />\r\nForecasting the socio-political situation and possible scenarios for the development of events in the country, region, in connection with the implementation of initiatives, political actions, expenditures in the economic and social policies of both federal and regional authorities. [3]</p>	\N	1	14	1	1	2020-12-04 11:36:29	2020-12-04 11:36:29
4	Tarix	История	History	Tarix	История	History	history	Tarixnoma atamasi bir nechta ma'nolarni anglatadi. Birinchidan, bu tarix qanday yozilganligi, tarixiy usul qanchalik to'g'ri qo'llanilganligi va tarixiy bilim qanday rivojlanayotganligi haqidagi fan. Ikkinchidan, xuddi shu atama ko'pincha tematik yoki boshqa yo'l bilan umumiy to'plamdan tanlangan tarixiy asarlar to'plamini bildiradi (masalan, 1960-yillarning O'rta asrlar haqidagi tarixshunosligi). Uchinchidan, tarixshunoslik atamasi aniq tarixchilarning qarashlari va asarlarini o'rganishni anglatadi (tarixiy asarlarni yaratish sabablari, ularning mavzusini tanlash, voqealarni talqin qilish usuli, muallif va uning tinglovchilarining shaxsiy e'tiqodlari, dalillardan foydalanish amaliyoti va boshqa tarixchilarga havolalar tahlil qilingan). Professional tarixchilar, shuningdek, tomoshabinlar uchun raqobatlashadigan insoniyat tarixining yagona hikoyasini yoki bunday hikoyalar turkumini yaratish imkoniyatini muhokama qilmoqdalar.	Термин историография имеет несколько значений. Во-первых, это наука о том, как пишется история, насколько правильно применяется исторический метод и как развивается историческое познание. Во-вторых, тем же термином обозначают совокупность исторических трудов, часто тематически или иным способом отобранных из общей совокупности (например, историография 1960-х годов о Средних веках). В-третьих, термином историография обозначают изучение взглядов и работ конкретных историков (анализируются причины создания исторических сочинений, выбор их тематики, способ интерпретации событий, личные убеждения автора и его аудитории, практика использования доказательств и ссылок на других историков). Профессиональные историки обсуждают также возможность создания единого рассказа об истории человечества или серии таких рассказов, конкурирующих за аудиторию.	The term historiography has several meanings. First, it is the science of how history is written, how correctly the historical method is applied, and how historical knowledge develops. Secondly, the same term denotes a set of historical works, often thematically or in some other way selected from the general set (for example, the historiography of the 1960s about the Middle Ages). Thirdly, the term historiography denotes the study of the views and works of specific historians (the reasons for the creation of historical works, the choice of their subject matter, the way of interpreting events, the personal beliefs of the author and his audience, the practice of using evidence and references to other historians are analyzed). Professional historians are also discussing the possibility of creating a single narrative of human history, or a series of such stories, competing for an audience.	<p>Muayyan madaniyatda mashhur bo&#39;lgan, ammo uchinchi tomon manbalari tomonidan qo&#39;llab-quvvatlanmaydigan hikoyalar, masalan, Qirol Artur afsonasi, odatda madaniy merosning bir qismi hisoblanadi, &quot;xolis izlanishlar&quot; emas, bu ilmiy intizom sifatida tarixning har qanday qismi bo&#39;lishi kerak [6] [7]. ...</p>\r\n\r\n<p>Tarix so&#39;zi yunon tilidan (Horoza, historia) kelib chiqqan va proto-hind-evropaning wid-tor- so&#39;zidan kelib chiqqan bo&#39;lib, bu erda ildizi weid-, &quot;bilish, ko&#39;rish&quot; [8] [9]. Rus tilida &quot;ko&#39;rish&quot; va &quot;mas&#39;ul bo&#39;lish&quot; so&#39;zlari bilan ifodalanadi [10].</p>\r\n\r\n<p>Qadimgi Yunonistonda &quot;tarix&quot; so&#39;zi nafaqat zamonaviy ma&#39;noda tarixiy bilimning o&#39;zi, balki tadqiqot natijasida olingan har qanday bilimni anglatardi. Masalan, Aristotel ushbu so&#39;zni &quot;Hayvonlar tarixi&quot; da ishlatgan [11]. Shuningdek, u Gomer madhiyalarida, Geraklit asarlarida va Afina davlatiga qasamyod matnida uchraydi. Qadimgi yunonlarda ham &quot;kashf qilish uchun&quot; historein so&#39;zi mavjud bo&#39;lib, u dastlab faqat Ioniyada ishlatilgan, keyinchalik u butun Yunonistonga va oxir-oqibat butun ellinizm tsivilizatsiyasiga tarqalgan.</p>\r\n\r\n<p>Xuddi shu qadimgi yunoncha ma&#39;noda &quot;tarix&quot; so&#39;zi XVII asrda Frensis Bekon tomonidan keng tarqalgan &quot;tabiiy tarix&quot; atamasida ishlatilgan. Bekon uchun tarix &quot;makon va zamonda o&#39;rni aniqlangan narsalar to&#39;g&#39;risida bilimdir&quot; va uning manbasi xotira (xuddi fan aks ettirish mevasi, she&#39;riyat esa xayol mevasi bo&#39;lgani kabi). O&#39;rta asrlarda Angliyada &quot;tarix&quot; so&#39;zi odatda umuman hikoya ma&#39;nosida ishlatilgan. O&#39;tgan voqealar ketma-ketligi sifatida tarix (tarix) maxsus atamasi XV asr oxirida ingliz tilida, &quot;tarixiy&quot; (tarixiy, tarixiy) so&#39;zi esa 17 asrda paydo bo&#39;lgan [12]. Germaniya, Frantsiya va Rossiyada ikkala ma&#39;noda ham xuddi shu &quot;tarix&quot; so&#39;zi ishlatilmoqda [11].</p>	<p>Истории, популярные в той или иной&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%9A%D1%83%D0%BB%D1%8C%D1%82%D1%83%D1%80%D0%B0" title="Культура">культуре</a>, но не подтверждаемые сторонними источниками, например, легенды о&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D1%80%D0%BE%D0%BB%D1%8C_%D0%90%D1%80%D1%82%D1%83%D1%80" title="Король Артур">короле Артуре</a>, считаются обычно частью&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%9A%D1%83%D0%BB%D1%8C%D1%82%D1%83%D1%80%D0%BD%D1%8B%D0%B5_%D1%86%D0%B5%D0%BD%D0%BD%D0%BE%D1%81%D1%82%D0%B8" title="Культурные ценности">культурного наследия</a>, а не &laquo;беспристрастным исследованием&raquo;, которым должна быть любая часть истории как научной дисциплины<sup><a href="https://ru.wikipedia.org/wiki/%D0%98%D1%81%D1%82%D0%BE%D1%80%D0%B8%D1%8F#cite_note-6">[6]</a></sup><sup><a href="https://ru.wikipedia.org/wiki/%D0%98%D1%81%D1%82%D0%BE%D1%80%D0%B8%D1%8F#cite_note-Low1-7">[7]</a></sup>.</p>\r\n\r\n<p>Слово&nbsp;<em>история</em>&nbsp;пришло из&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%93%D1%80%D0%B5%D1%87%D0%B5%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA" title="Греческий язык">греческого языка</a>&nbsp;(<em>ἱ&sigma;&tau;&omicron;&rho;ί&alpha;</em>,&nbsp;<em>historia</em>), и происходит от&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%B0%D0%B8%D0%BD%D0%B4%D0%BE%D0%B5%D0%B2%D1%80%D0%BE%D0%BF%D0%B5%D0%B9%D1%81%D0%BA%D0%B8%D0%B9_%D1%8F%D0%B7%D1%8B%D0%BA" title="Праиндоевропейский язык">праиндоевропейского слова</a>&nbsp;<em>wid-tor-</em>, где корень&nbsp;<em>weid-</em>, &laquo;знать, видеть&raquo;<sup><a href="https://ru.wikipedia.org/wiki/%D0%98%D1%81%D1%82%D0%BE%D1%80%D0%B8%D1%8F#cite_note-JosephJanda-8">[8]</a></sup><sup><a href="https://ru.wikipedia.org/wiki/%D0%98%D1%81%D1%82%D0%BE%D1%80%D0%B8%D1%8F#cite_note-9">[9]</a></sup>. В русском языке представлен словами &laquo;видеть&raquo; и &laquo;ведать&raquo;<sup><a href="https://ru.wikipedia.org/wiki/%D0%98%D1%81%D1%82%D0%BE%D1%80%D0%B8%D1%8F#cite_note-10">[10]</a></sup>.</p>\r\n\r\n<p>В&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%94%D1%80%D0%B5%D0%B2%D0%BD%D1%8F%D1%8F_%D0%93%D1%80%D0%B5%D1%86%D0%B8%D1%8F" title="Древняя Греция">Древней Греции</a>&nbsp;слово &laquo;история&raquo; означало любое знание, получаемое путём исследования, а не только собственно историческое знание в современном смысле. Например,&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%90%D1%80%D0%B8%D1%81%D1%82%D0%BE%D1%82%D0%B5%D0%BB%D1%8C" title="Аристотель">Аристотель</a>&nbsp;использовал это слово в &laquo;Истории животных&raquo;<sup><a href="https://ru.wikipedia.org/wiki/%D0%98%D1%81%D1%82%D0%BE%D1%80%D0%B8%D1%8F#cite_note-Ferrater-Mora-11">[11]</a></sup>. Оно встречается также в гимнах&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%93%D0%BE%D0%BC%D0%B5%D1%80" title="Гомер">Гомера</a>, сочинениях&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%93%D0%B5%D1%80%D0%B0%D0%BA%D0%BB%D0%B8%D1%82" title="Гераклит">Гераклита</a>&nbsp;и тексте присяги Афинскому государству. В древнегреческом было также слово&nbsp;<em>histore&icirc;n</em>, &laquo;исследовать&raquo;, которое сначала использовалось только в&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%98%D0%BE%D0%BD%D0%B8%D1%8F" title="Иония">Ионии</a>, откуда затем распространилось на всю Грецию и, в конце концов, всю&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%AD%D0%BB%D0%BB%D0%B8%D0%BD%D0%B8%D0%B7%D0%BC" title="Эллинизм">эллинистическую цивилизацию</a>.</p>\r\n\r\n<p>В том же древнегреческом смысле слово &laquo;история&raquo; употреблялось в XVII веке&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%91%D1%8D%D0%BA%D0%BE%D0%BD,_%D0%A4%D1%80%D1%8D%D0%BD%D1%81%D0%B8%D1%81" title="Бэкон, Фрэнсис">Фрэнсисом Бэконом</a>&nbsp;в широкоупотребительном термине &laquo;<a href="https://ru.wikipedia.org/wiki/%D0%95%D1%81%D1%82%D0%B5%D1%81%D1%82%D0%B2%D0%B5%D0%BD%D0%BD%D0%B0%D1%8F_%D0%B8%D1%81%D1%82%D0%BE%D1%80%D0%B8%D1%8F" title="Естественная история">естественная история</a>&raquo;. Для Бэкона история&nbsp;&mdash; &laquo;знание о предметах, место которых определено в пространстве и времени&raquo;, и источником которого является&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%9F%D0%B0%D0%BC%D1%8F%D1%82%D1%8C" title="Память">память</a>&nbsp;(так же как&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%9D%D0%B0%D1%83%D0%BA%D0%B0" title="Наука">наука</a>&nbsp;&mdash; плод размышлений, а&nbsp;<a href="https://ru.wikipedia.org/wiki/%D0%9F%D0%BE%D1%8D%D0%B7%D0%B8%D1%8F" title="Поэзия">поэзия</a>&nbsp;&mdash; плод фантазии). В средневековой Англии слово &laquo;история&raquo; чаще использовалось в смысле рассказа вообще (<em>story</em>). Особый термин история (<em>history</em>) как последовательность прошедших событий появился в английском языке в конце&nbsp;<a href="https://ru.wikipedia.org/wiki/XV_%D0%B2%D0%B5%D0%BA" title="XV век">XV&nbsp;века</a>, а слово &laquo;исторический&raquo; (<em>historical</em>,&nbsp;<em>historic</em>)&nbsp;&mdash; в&nbsp;<a href="https://ru.wikipedia.org/wiki/XVII_%D0%B2%D0%B5%D0%BA" title="XVII век">XVII&nbsp;веке</a><sup><a href="https://ru.wikipedia.org/wiki/%D0%98%D1%81%D1%82%D0%BE%D1%80%D0%B8%D1%8F#cite_note-Whitney-12">[12]</a></sup>. В Германии, Франции и России в обоих смыслах по-прежнему употребляется одно и то же слово &laquo;история&raquo;<sup><a href="https://ru.wikipedia.org/wiki/%D0%98%D1%81%D1%82%D0%BE%D1%80%D0%B8%D1%8F#cite_note-Ferrater-Mora-11">[11]</a></sup>.</p>	<p>Stories that are popular in a particular culture but are not supported by third-party sources, such as the legend of King Arthur, are usually considered part of the cultural heritage, and not &quot;impartial research&quot;, which should be any part of history as a scientific discipline [6] [7] ...</p>\r\n\r\n<p>The word history comes from the Greek language (ἱ&sigma;&tau;&omicron;&rho;ί&alpha;, historia), and comes from the Proto-Indo-European word wid-tor-, where the root is weid-, &ldquo;to know, to see&rdquo; [8] [9]. In Russian it is represented by the words &ldquo;to see&rdquo; and &ldquo;to be in charge&rdquo; [10].</p>\r\n\r\n<p>In ancient Greece, the word &quot;history&quot; meant any knowledge obtained through research, and not just historical knowledge itself in the modern sense. For example, Aristotle used this word in the &quot;History of Animals&quot; [11]. It is also found in the hymns of Homer, the writings of Heraclitus and the text of the oath to the Athenian state. Ancient Greek also had the word histore&icirc;n, &ldquo;to explore,&rdquo; which at first was used only in Ionia, from where it then spread to all of Greece and, ultimately, the entire Hellenistic civilization.</p>\r\n\r\n<p>In the same ancient Greek sense, the word &quot;history&quot; was used in the 17th century by Francis Bacon in the widely used term &quot;natural history.&quot; For Bacon, history is &quot;knowledge about objects whose place is determined in space and time&quot;, and the source of which is memory (just as science is the fruit of reflection, and poetry is the fruit of fantasy). In medieval England, the word &quot;history&quot; was more often used in the sense of a story in general. The special term history (history) as a sequence of past events appeared in English at the end of the 15th century, and the word &quot;historical&quot; (historical, historic) - in the 17th century [12]. In Germany, France and Russia, in both senses, the same word &ldquo;history&rdquo; is still used [11].</p>	1	2	3	1	1	2020-12-04 11:50:39	2020-12-04 11:50:39
7	Vazifalar va qiymatlar	Миссия и ценности	Mission and values	Vazifalar va qiymatlar	Миссия и ценности	Mission and values	missionvalues	Iqtisodiyot nazariyasi fanida tovar qiymatining negizini nima tashkil qiladi degan savolga javob berishda ikki xil yo’nalish mavjud hamda ular o’rtasida doimiy ravishda tortishuvlar va munozaralar bo’lib kelmoqda. Biz quyida shu ikki xil yo’nalishdagi nazariyalarning mazmunini o’quvchiga havola qilamiz	В экономической теории есть два направления в ответе на вопрос о том, что составляет основу стоимости товара, и между ними постоянно ведутся споры и дискуссии. Ниже мы представляем читателю содержание этих двух различных теорий.	There are two approaches to the question of what constitutes the basis of the value of a commodity in the science of economic theory, and there are constant debates and discussions between them. Below we present to the reader the content of these two different theories	<p>Qiymat qonuni tovar ishlab chiqaruvchilarni ularning individual mehnat sarflari bilan ijtimoiy zaruriy mehnat sarflari o&rsquo;trasidagi farq tovar ishlab chiqaruvchilarni tabaqalashtiradi, mehnat va moddiy sarflarni kamaytirishni rag&rsquo;batlantiradi va mehnatning ishlab chiqarish sohalari bo&rsquo;yicha taqsimlanishini tartibga solib turadi. Masalan, eng yuksak mehnat unumdorligiga erishgan ishlab chiqaruvchilar o&rsquo;z tovarlarini ijtimoiy zarur sarflaridan kamroq, lekin ayrim individual sarflaridan yuqori narxlarga sotishlari va yuqori foyda olishlari mumkin. Lekin ular ish faoliyatining muvaffaqiyati ko&rsquo;proq kafolatlangan deb bo&rsquo;lmaydi. Chunki ular texnik va tashkiliy jihatdan yangiliklarni ishlab chiqarishga o&rsquo;z vaqtida qo&rsquo;llab turmasalar, yuqoriroq samara beradigan ishlab chiqarish usullarini qidirib topmasalar, ma&rsquo;lum vaqtdan so&rsquo;ng o&rsquo;z ustunliklaridan ajralib qolishlari mumkin</p>	<p>Закон стоимости отличает товаропроизводителей от их индивидуальных затрат на рабочую силу и общественно необходимых затрат на рабочую силу, способствует сокращению трудовых и материальных затрат и регулирует распределение труда по промышленности. Например, наиболее продуктивные производители могут продавать свои товары по цене меньше, чем их общественно необходимые расходы, но по более высоким ценам, чем некоторые индивидуальные расходы, и получать более высокую прибыль. Но им больше не гарантирован успех. Потому что, если они вовремя не внедряют технические и организационные инновации, если они не ищут более эффективные методы производства, они могут со временем потерять свое преимущество.</p>	<p>The law of value differentiates commodity producers from their individual labor costs and socially necessary labor costs, encourages the reduction of labor and material costs, and regulates the distribution of labor by industry. For example, the most productive producers can sell their goods for less than their socially necessary expenditures, but at higher prices and make higher profits from some individual expenditures. But they are not the only guarantee of success. Because if they don&#39;t technically and organizationally innovate in time, if they don&#39;t look for more efficient production methods, they may lose their advantages over time.</p>	1	4	5	1	1	2020-12-04 15:42:49	2020-12-04 15:42:49
3	Xizmatlar	Сервисы	Services	Xizmatlar	Сервисы	Services	services	Iqtisodiyotning barqaror rivojlanishini ta`minlash, aholining turmush darajasini oshirish va samarali\r\nbandligini ta`minlashda xizmatlar sohasining har tomonlama rivojlanishi muhim masalalardan biri\r\nbo`lib hisoblanadi.\r\nTajriba shuni ko`rsatmoqdaki, hozirgi kunda rivojlangan va rivojlanayotgan mamlakatlar iqtisodiy\r\no`sishni ta`minlash uchun xizmatlar sohasini jadal rivojlantirishni eng muhim vazifalardan biri sifatida\r\nqo`yishmoqda.	Обеспечение устойчивого экономического развития, повышение уровня жизни и эффективности\r\nОдин из важнейших вопросов в сфере занятости - комплексное развитие сферы услуг.\r\nявляется\r\nОпыт показывает, что сегодня развитые и развивающиеся страны экономически\r\nОдна из важнейших задач - ускорить развитие сферы услуг для обеспечения роста\r\nставим.	Ensuring sustainable economic development, improving living standards and efficiency\r\nOne of the most important issues in employment is the comprehensive development of the services sector\r\nis\r\nExperience shows that today developed and developing countries are economically\r\nOne of the most important tasks is to accelerate the development of the services sector to ensure growth\r\nare putting.	<p>Xizmatlar sohasi aholining barcha qatlamlarini qamrab oladi va jamiyatda sodir bo`layotgan deyarli barcha ijtimoiy-iqtisodiy jarayonlarga ta`sir ko`rsatadi, bu esa mazkur masalaning qanchalik muhim va ahamiyatli ekanligini ko`rsatib beradi. O`zbekistonda mustaqillik yillarida, iqtisodiyotni diversifikatsiyalash va tarkibiy o`zgartirishlarni chuqurlashtirish, mamlakat aholisining bandligini, daromadlarini va turmush sifatini oshirishning muhim yo`nalishlari va omillaridan biri sifatida xizmatlar sohasi va servisni jadal rivojlantirish bo`yicha tizimli ishlar amalga oshirildi. Bundan tashqari, iqtisodiyotning barqaror o`sishini ta`minlashda mazkur soha muhim o`rinni egallamoqda. I. Xizmatlar Xizmatlar sohasini rivojlantirish dasturining asosiy vazifalari va yo`nalishlarini amalga oshirish jarayonida, 2010-2016 yillarda bozor xizmatlari hajmi 2,6 martaga oshib, 6060,0 mlrd. so`mgacha ko`paydi. Aholi jon boshiga ko`rsatilgan xizmatlar hajmi mazkur davrda 2,4 martaga o`sdi va 1675,0 ming so`mni tashkil etdi (1-jadval).</p>	<p>Сфера услуг охватывает все слои населения и происходит в обществе.<br />\r\nзатрагивает практически все социально-экономические процессы, в чем и заключается эта проблема<br />\r\nпоказывает, что это важно и значимо.<br />\r\nЗа годы независимости в Узбекистане произошла экономическая диверсификация и структурные изменения.<br />\r\nуглубление, повышение занятости, доходов и качества жизни населения страны<br />\r\nоб ускоренном развитии сферы услуг и услуг как об одном из важных направлений и факторов<br />\r\nпроведена планомерная работа. Кроме того, это важно для устойчивого экономического роста.<br />\r\nПромышленность играет важную роль.<br />\r\nI. Услуги<br />\r\nРеализация основных задач и направлений программы развития сферы услуг.<br />\r\nЗа период 2010-2016 гг. Объем рыночных услуг увеличился в 2,6 раза и составил 6060,0 млрд. Сумов. подвести<br />\r\nвыросла. Объем оказанных услуг на душу населения за этот период увеличился в 2,4 раза и составил 1675,0.<br />\r\nтыс. сумов (таблица 1).</p>	<p>The service sector covers all segments of the population and is happening in society<br />\r\naffects almost all socio-economic processes, which is the extent of this issue<br />\r\nshows that it is important and significant.<br />\r\nDuring the years of independence in Uzbekistan, economic diversification and structural changes<br />\r\ndeepening, increasing employment, income and quality of life of the country&#39;s population<br />\r\nOne of the important directions and factors is the rapid development of the service sector and services<br />\r\nsystematic work has been done. In addition, it is important for sustainable economic growth<br />\r\nThe industry plays an important role.<br />\r\nI. Services<br />\r\nImplementation of the main tasks and directions of the service sector development program<br />\r\nDuring the period 2010-2016, the volume of market services increased by 2.6 times and amounted to 6060.0 billion soums. to sum<br />\r\nincreased. The volume of services provided per capita during this period increased by 2.4 times and amounted to 1675.0<br />\r\nthousand soums (Table 1).</p>	2	16	17	1	1	2020-12-04 11:45:58	2020-12-04 11:45:58
8	Press-relizlar	Пресс-релизы	Press releases	Press-relizlar	Пресс-релизы	Press releases	pressrelis	2016 yil 2 martda soat 15-00 da O'zbekiston Milliy matbuot markazida “O'zqurilishmateriallari” AK tomonidan sohada tarkibiy o'zgartirishlar, ishlab chiqarishni modernizatsiyalash va diversifikatsiyalash, shuningdek korxonalarda zamonaviy korporativ boshqaruvni joriy etish bo'yicha amalga oshirilgan ishlar to'g'risida” mavzusida Matbuot konferentsiyasi o'tkaziladi.	2 марта 2016 года в 15:00 в Национальном пресс-центре Узбекистана проведена работа, проводимая АК «Узстройматериалы» по структурным изменениям в отрасли, модернизации и диверсификации производства, а также внедрению современного корпоративного управления на предприятиях. По этой теме состоится пресс-конференция.	On March 2, 2016 at 15:00 in the National Press Center of Uzbekistan will be held a meeting of JSC "Uzstroymaterialy" on structural changes in the industry, modernization and diversification of production, as well as the introduction of modern corporate governance in enterprises. A press conference will be held on the topic.	<p>Bugungi kunda &ldquo;O&#39;zqurilishmateriallari&rdquo; AK tarkibida 120 dan ortiq yirik, o&#39;rta va kichik biznes korxonalari faoliyat yuritadi, ular tomonidan 100 dan ortiq qurilish materiallari ishlab chiqilmoqda.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mahalliy raqobatbardosh qurilish mahsulotlari bilan bozorni to&#39;ldirish, import o&#39;rnini bosish va eksport hajmini oshirish maqsadida, bugungi kunda kompaniya tomonidan muntazam ravishda bozorning qurilish materiallariga bo&#39;lgan ehtiyoji o&#39;rganib borilmoqda, qurilish materiallarining importi va eksportii monitoringi va tahlili olib borilmoqda.</p>	<p>Сегодня в АК &laquo;Узстройматериалы&raquo; работает более 120 крупных, средних и малых предприятий, которые производят более 100 строительных материалов.</p>\r\n\r\n<p>Для того, чтобы наполнить рынок местными конкурентоспособными строительными продуктами, заместить импорт и увеличить экспорт, сегодня компания регулярно изучает рыночный спрос на строительные материалы, отслеживает и анализирует импорт и экспорт строительных материалов.</p>	<p>Today, Uzstroymaterialy JSC has more than 120 large, medium and small businesses, which produce more than 100 building materials.</p>\r\n\r\n<p>In order to fill the market with local competitive construction products, replace imports and increase exports, the company today regularly studies the market demand for construction materials, monitors and analyzes the import and export of construction materials.</p>	1	6	7	1	1	2020-12-04 15:47:37	2020-12-04 15:47:37
9	OAV biz haqimizda	СМИ о нас	The media is about us	OAV biz haqimizda	СМИ о нас	The media is about us	maboutus	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.	Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.	<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>	<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>\r\n\r\n<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>	<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>	1	8	9	1	1	2020-12-04 16:02:34	2020-12-04 16:07:06
10	Rasmlar	Картинки	Pictures	Rasmlar	Картинки	Pictures	photospages	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>\r\n\r\n<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	1	10	11	1	1	2020-12-04 16:06:10	2020-12-04 16:06:10
11	Press uchun kontaktlar	Контакты для прессы	Contacts for the press	Press uchun kontaktlar	Контакты для прессы	Contacts for the press	presscontact	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>\r\n\r\n<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	1	12	13	1	1	2020-12-04 16:08:52	2020-12-04 16:08:52
5	Kompaniya haqida	О компании	About company	Kompaniya haqida	О компании	About company	about_company	Sizning biznes-rejangizning kompaniyani tavsiflash bo'limi odatda ijro etuvchi xulosadan keyingi ikkinchi qismdir.1 Kompaniya tavsifida sizning kompaniyangiz haqida juda muhim tafsilotlar, masalan, siz qaerda joylashganingiz, kompaniyaning kattaligi, nima qilayotganingiz va nima qilishga umid qilasiz.	Раздел с описанием компании вашего бизнес-плана, как правило, является вторым разделом, идущим после исполнительного резюме.1 Описание компании содержит важные детали о вашей компании, например, где вы находитесь, насколько велика компания, чем вы занимаетесь и чего вы надеетесь достичь.	The company description section of your business plan is typically the second section, coming after the executive summary.1﻿ The company description outlines vital details about your company, such as where you are located, how large the company is, what you do, and what you hope to accomplish.	<p>Siz kiritmoqchi bo&#39;lgan asosiy ma&#39;lumotlarni tartibga solgandan so&#39;ng, bo&#39;limni o&#39;quvchilarga yoqadigan tarzda yozishingiz kerak. Muvaffaqiyatli kompaniya tavsifini yaratishda yordam berish uchun besh bosqichni bajaring.</p>\r\n\r\n<p>Lift balandligidan boshlang: kompaniyani tavsiflash bo&#39;limini kompaniyangiz haqidagi barcha muhim ma&#39;lumotlarni o&#39;z ichiga olgan xat bilan boshlang. Tasavvur qiling, siz o&#39;zingizning kompaniyangiz haqida lift pitchini beryapsiz va asosiy xususiyatlarni bir necha jumla bilan ifodalashni xohlaysiz. Kirish xatboshisi uchun xuddi shu fikrlash jarayonidan foydalaning.<br />\r\nYuqori darajadagi ma&#39;lumotlarga tayanib turing: kompaniyangiz tavsifidagi ba&#39;zi ma&#39;lumotlar biznes rejangizning boshqa bo&#39;limlariga kiritiladi. Ushbu qismlar uchun faqat yuqori darajadagi obzorni taqdim eting va tegishli bo&#39;lim uchun barcha aniq ma&#39;lumotlarni qoldiring.<br />\r\nO&#39;zingizning ishtiyoqingizni ko&#39;rsating: kompaniyani tavsiflash qismida nima uchun kompaniyani boshlaganingizni va nimaga erishmoqchi ekaningizni tushuntirib berayotganda ehtiros va hayajoningiz namoyon bo&#39;lsin. Sizning hayajoningiz yozish ohangida namoyon bo&#39;lishi kerak va sizning maqsadingiz o&#39;quvchini biznes-rejaning qolgan qismini o&#39;qishga qiziqtirishdir.<br />\r\nUzunlikni tekshirib ko&#39;ring: kompaniyangizni boshlashga undagan ishtiyoq va hayajon haqida yozayotganingizda, o&#39;z fikringizni tushuntirish uchun kerak bo&#39;lgandan ko&#39;proq so&#39;zlarni ishlatish osonroq bo&#39;ladi. Kompaniyangizning tavsifini tuzganingizdan so&#39;ng, orqaga qayting va keraksiz qismlarni yoki ortiqcha ma&#39;lumotni aniq va ravshan qilish uchun kesib tashlang.<br />\r\nBuni tekshirib ko&#39;ring: Kompaniya tavsifining turli xil qoralamalarini ko&#39;rmagan odamdan uni o&#39;quvchiga ta&#39;siriga ta&#39;sir qilishi mumkin bo&#39;lgan xatolar, grammatik xatolar yoki oqim muammolari uchun ko&#39;rib chiqishni so&#39;rang.</p>	<p>После того, как вы организовали ключевую информацию, которую хотите включить, вам нужно написать раздел так, чтобы он был привлекательным для читателей. Выполните пять шагов, чтобы создать успешное описание компании.</p>\r\n\r\n<p>Начните с презентации: начните раздел с описанием компании абзацем, в котором содержится вся важная информация о вашей компании. Представьте, что вы рассказываете о своей компании и хотите выразить ее ключевые характеристики всего в нескольких предложениях. Используйте тот же процесс мышления для вступительного абзаца.<br />\r\nПридерживайтесь высокоуровневой информации: некоторая информация из описания вашей компании будет включена в другие разделы вашего бизнес-плана. Для этих частей предоставьте только общий обзор и оставьте все конкретные детали для соответствующего раздела.<br />\r\nПродемонстрируйте свою страсть: позвольте вашей страсти и воодушевлению проявиться в разделе описания компании, когда вы объясните, почему вы основали компанию и чего надеетесь достичь. Ваше волнение должно отражаться в тоне вашего письма, и ваша цель должна заключаться в том, чтобы заинтересовать читателя прочтением остальной части бизнес-плана.<br />\r\nПроведите проверку длины: когда вы пишете о страсти и азарте, которые привели вас к созданию компании, может быть легко увлечься и использовать больше слов, чем необходимо, чтобы донести свою точку зрения. После того, как вы составили описание своей компании, вернитесь и удалите все ненужные части или избыточную информацию, чтобы сделать ее ясной и краткой.<br />\r\nСделайте корректуру: попросите кого-нибудь, кто не видел различных черновиков описания компании, проверить его на предмет опечаток, грамматических ошибок или проблем с потоком, которые могут повлиять на влияние, которое оно оказывает на читателя.</p>	<p>Once you&#39;ve organized the key information that you want to include, you need to write the section in a way that will be appealing to readers. Follow five steps to help create a successful company description.</p>\r\n\r\n<ol>\r\n\t<li><strong>Start with an&nbsp;<a href="https://www.thebalancesmb.com/pitching-business-ideas-to-investors-4018990">elevator pitch</a></strong>: Begin the company description section with a paragraph that captures all of the vital information about your company. Imagine you are giving an elevator pitch about your company and want to express the key characteristics in just a few sentences. Use the same thought process for your introductory paragraph.</li>\r\n\t<li><strong>Stick with high-level information:&nbsp;</strong>Some of the information in your company description will be included in other sections of your business plan. For these parts, provide only a high-level overview and leave all of the specific details for the related section.</li>\r\n\t<li><strong>Show your passion</strong>: Let your passion and excitement show in the company description section as you explain why you started the company and what you hope to accomplish. Your excitement should show in the tone of your writing, and your aim should be to get the reader interested in reading the rest of the business plan.</li>\r\n\t<li><strong>Do a length check:&nbsp;</strong>When you&#39;re writing about the passion and excitement that led you to start your company, it can be easy to get carried away and use more words than necessary to get your point across. Once you&#39;ve drafted your company description, go back and cut out any unnecessary parts or redundant information to make it clear and concise.</li>\r\n\t<li><strong>Have it proofread:&nbsp;</strong>Ask someone who hasn&#39;t seen various drafts of the company description to review it for typos, grammatical errors, or flow problems that could hurt the impact it has on the reader.</li>\r\n</ol>	\N	29	42	1	1	2020-12-04 14:21:38	2020-12-04 14:21:38
12	Yetkazib berish	Доставка	Delivery	Yetkazib berish	Доставка	Delivery	deliverypage	Jo’natma va banderollarni yetkazib berish kuryerlik xizmati, eng tez va ishonchli xizmatlardan biridir. Jo’natma va banderollarni yetkazib berish kategoriyasiga 30kg gacha bo’lgan ixcham yuklar kiradi.	Курьерская служба доставки и доставки посылок - одна из самых быстрых и надежных служб. В категорию посылок и посылок входят компактные грузы до 30 кг.	Delivery and parcel delivery courier service is one of the fastest and most reliable services. The category of parcels and parcels includes compact cargo up to 30 kg.	<p>&laquo;Express Mail Universal&raquo; pochta va kuryerlik xizmatining bu turi yuk jo&rsquo;natishga ketkazadigan vaqtingizni maksimal tarzda qisqartiradi, shu bilan birga, kuryerlarning professionalligi va original qadoqlash hisobiga qimmatbaho banderol va shu kabi jo&rsquo;natmalar butun saqlagan va zarar yetkazmagan holda yetkazib beradi.</p>\r\n\r\n<p>Biz sizning jo&rsquo;natmangizni sizga qulay bo&rsquo;lgan manzildan olib ketamiz yoki, idoralarimizdan birida qabul qilib olamiz va yuborilgan shaxsning qo&rsquo;liga topshiramiz. Biz &laquo;Express Mail Universal&raquo; kompaniyasining qulay narxlari sizga manzur kelishiga ishonamiz.</p>\r\n\r\n<p>Jo&rsquo;natma va banderollarni yetkazib berish xizmatini, saytimizda&nbsp;<u>ariza</u>&nbsp;ro&rsquo;yxatga olish formasi yoki 0-(371)200-9669 va +998(95)198-9669 telefon raqamlari orqali buyurtma qilishingiz mumkin. Bundan tashqari siz hujjatlaringizni&nbsp;<u>&laquo;Express Mail Universal&raquo; kuryerlik xizmatlari</u>&nbsp;ofislaridan biriga olib kelib berishingiz mumkin.</p>	<p>Этот тип почтовой и курьерской службы Express Mail Universal сводит к минимуму время, которое вы тратите на доставку, доставляя ценные посылки и аналогичные отправления в целости и сохранности благодаря профессионализму курьеров и оригинальной упаковке.</p>\r\n\r\n<p>Мы заберем ваш груз в удобном месте или заберем в одном из наших офисов и передадим отправителю. Мы надеемся, что вам понравятся доступные цены на Express Mail Universal.</p>\r\n\r\n<p>Заказать услугу доставки посылок и посылок можно в форме регистрации заявки на нашем сайте или по телефонам 0- (371) 200-9669 и +998 (95) 198-9669. Вы также можете принести свои документы в один из офисов курьерской службы &laquo;Express Mail Universal&raquo;.</p>	<p>This type of Express Mail Universal postal and courier service minimizes the time you spend on shipping, while delivering expensive parcels and similar shipments intact and without damage due to the professionalism of the couriers and original packaging.</p>\r\n\r\n<p>We will pick up your shipment from a convenient location or pick it up at one of our offices and deliver it to the sender. We hope you enjoy the affordable prices of Express Mail Universal.</p>\r\n\r\n<p>You can order the service of delivery of parcels and envelopes on our website on the application registration form or by phone 0- (371) 200-9669 and +998 (95) 198-9669. You can also bring your documents to one of the offices of courier services &quot;Express Mail Universal&quot;.</p>	2	18	19	1	1	2020-12-04 16:12:09	2020-12-04 16:12:09
13	O'ziga qo'ng'iroq	Звонок самому себе	A call to himself	O'ziga qo'ng'iroq	Звонок самому себе	A call to himself	callhimself	"O‘zkomnazorat" davlat inspeksiyasi koronavirus pandemiyasi davrida mobil aloqa operatorlarining abonentlariga nisbatan firibgarlik yo‘li bilan hisob raqamidan pulni yechib olish holatlari uchragani va kuzatilishi mumkinligi haqida ogohlantiradi. Bu haqda inspeksiyaning axborot xizmati ma’lum qildi.	Госинспекция «Узкомназорат» предупреждает, что во время пандемии коронавируса были случаи мошенничества со счетами абонентов мобильных операторов. Об этом сообщает пресс-служба инспекции.	The State Inspectorate "Uzkomnazorat" warns that during the coronavirus pandemic, there have been and may be cases of fraudulent withdrawals from the accounts of subscribers of mobile operators. This was reported by the press service of the inspectorate.	<p>Ma&rsquo;lum qilinishicha, &quot;Vangiri&quot; nomli xorij raqamidan qo&lsquo;ng&lsquo;iroqni amalga oshirib, abonent ushbu raqamga qaytib qo&lsquo;ng&lsquo;iroq qilganidan keyin uning hisobidan katta miqdordagi mablag&lsquo;ni yechib olish holatlari kuzatilgan.</p>\r\n\r\n<p>Firibgarlar abonentga telefon qilib, unga javob berilmasidan ilgari aloqani uzib qo&lsquo;yadi. Muayyan odamlar esa xorijdan qilingan va o&lsquo;tkazib yuborilgan begona raqamga qaytib qo&lsquo;ng&lsquo;iroq qilishi oqibatida ularning hisobidan katta miqdordagi mablag&lsquo; yechib olinadi.</p>\r\n\r\n<p>Shuningdek, mobil aloqa operatorlardan olingan ma&rsquo;lumotlarga ko&lsquo;ra karantin davrida plastik kartalarni elektron tizimlar orqali boshqarilishida uchragan shubhali harakatlar monitoring qilinib, firibgarlikni oldini olish borasida tegishli choralar ko&lsquo;rilmoqda.</p>\r\n\r\n<p>&quot;O&lsquo;zkomnazorat&quot; davlat inspeksiyasi bu kabi salbiy holatlarning oldini olish uchun begona raqamdan, xorijdan qo&lsquo;ng&lsquo;iroq bo&lsquo;lgan va u o&lsquo;tkazib yuborilgan bo&lsquo;lsa raqamni qaytib termaslik, plastik karta raqami, pasport seriyasi va boshqa shaxsiy ma&rsquo;lumotlarni begonalarga oshkor qilmaslik, ijtimoiy tarmoqlarga joylashtirmaslikni tavsiya qiladi.</p>	<p>Сообщается, что после звонка с иностранного номера &laquo;Вангири&raquo; абонент перезвонил на этот номер и снял со своего счета крупную сумму денег.</p>\r\n\r\n<p>Мошенники звонят абоненту и прерывают соединение до того, как на него ответят. А когда определенные люди перезванивают на иностранный номер, который был сделан и отправлен за границу, с их счета списывается большая сумма денег.</p>\r\n\r\n<p>По словам операторов сотовой связи, за подозрительными действиями при обращении с электронными пластиковыми картами в период карантина ведется наблюдение и принимаются соответствующие меры для предотвращения мошенничества.</p>\r\n\r\n<p>Во избежание подобных инцидентов Государственная инспекция &laquo;Узкомназорат&raquo; не возвращает номер с иностранного номера, если есть звонок из-за границы и пропущенный, номер пластиковой карты, серию паспорта и другую личную информацию. советует не разглашать посторонним, не публиковать в социальных сетях.</p>	<p>It is reported that after making a call from a foreign number called &quot;Vangiri&quot;, the subscriber called back to this number and after withdrawing a large amount of money from his account.</p>\r\n\r\n<p>Fraudsters call a subscriber and cut off the connection before it is answered. And when certain people call back to a foreign number that has been made and sent abroad, a large amount of money is deducted from their account.</p>\r\n\r\n<p>According to mobile operators, suspicious actions in the management of electronic plastic cards during the quarantine period are being monitored and appropriate measures are being taken to prevent fraud.</p>\r\n\r\n<p>In order to prevent such incidents, the State Inspectorate &quot;Uzkomnazorat&quot; does not return the number from a foreign number, if there is a call from abroad and missed, plastic card number, passport series and other personal information. advises not to disclose to strangers, not to post on social networks.</p>	2	20	21	1	1	2020-12-04 16:15:14	2020-12-04 16:15:14
16	Ijarachilar uchun	Арендаторам	For tenants	Ijarachilar uchun	Арендаторам	For tenants	arendachi	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>\r\n\r\n<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	5	36	37	1	1	2020-12-04 16:23:58	2020-12-04 16:23:58
2	Xizmat	Oбслуживание	Service	Xizmat	Oбслуживание	Service	service	Iqtisodiyotda xizmat - bu hech qanday jismoniy tovarlar sotuvchidan xaridorga o'tkazilmaydigan bitim. Bunday xizmatning afzalliklari xaridorning birjani amalga oshirishga tayyorligi bilan namoyon bo'ladi. Davlat xizmatlari - bu jamiyat (milliy davlat, moliya ittifoqi yoki mintaqa) umuman to'laydigan xizmatlar. Resurslar, mahorat, zukkolik va tajribadan foydalangan holda, xizmat ko'rsatuvchi provayderlar xizmat iste'molchilariga foyda keltiradi. Xizmat nomoddiy xususiyatga ega.	В экономике услуга - это транзакция, при которой физические товары не передаются от продавца к покупателю. Считается, что преимущества такой услуги демонстрируются готовностью покупателя произвести обмен. Общественные услуги - это те услуги, за которые платит общество (национальное государство, финансовый союз или регион) в целом. Используя ресурсы, навыки, изобретательность и опыт, поставщики услуг приносят пользу потребителям услуг. Услуга нематериальна по своей природе.	In economics, a service is a transaction in which no physical goods are transferred from the seller to the buyer. The benefits of such a service are held to be demonstrated by the buyer's willingness to make the exchange. Public services are those that society (nation state, fiscal union or region) as a whole pays for. Using resources, skill, ingenuity, and experience, service providers benefit service consumers. Service is intangible in nature.	<p>Nomoddiylik<br />\r\nXizmatlar ta&#39;rifi bo&#39;yicha nomoddiydir. Ular ishlab chiqarilmaydi, tashilmaydi yoki stoklanmaydilar.</p>\r\n\r\n<p>Kelajakda foydalanish uchun xizmatlarni saqlash mumkin emas. Ular bir vaqtning o&#39;zida ishlab chiqariladi va iste&#39;mol qilinadi.</p>\r\n\r\n<p>Tez buzilish<br />\r\nXizmatlar ikki jihatdan buziladi:</p>\r\n\r\n<p>Xizmatga tegishli manbalar, jarayonlar va tizimlar ma&#39;lum bir vaqt ichida xizmat ko&#39;rsatish uchun tayinlangan. Agar xizmatni iste&#39;molchi ushbu davrda xizmatni so&#39;ramasa va iste&#39;mol qilmasa, tegishli manbalar ishlatilmasligi mumkin. Xizmat ko&#39;rsatuvchi provayder nuqtai nazaridan, agar ushbu resurslardan boshqa foydalanish imkoniyati bo&#39;lmasa, bu yo&#39;qolgan biznes imkoniyati. Misollar: Sartarosh boshqa mijozga xizmat qiladi. Samolyotdagi bo&#39;sh o&#39;rindiq uchib ketgandan keyin to&#39;ldirilmaydi.<br />\r\nXizmat iste&#39;molchiga to&#39;liq taqdim etilgandan so&#39;ng, ushbu maxsus xizmat bekor qilinadi. Misol: yo&#39;lovchi belgilangan manzilga etkazilgan.<br />\r\nXizmat ko&#39;rsatuvchi provayder xizmatni iste&#39;mol qilinadigan aniq vaqtda ko&#39;rsatishi kerak. Xizmat ko&#39;rsatuvchi provayderdan mustaqil bo&#39;lgan jismoniy ob&#39;ektda namoyon bo&#39;lmaydi. Xizmatni iste&#39;molchi, shuningdek, xizmat ko&#39;rsatishdan ajralmaydi. Misollar: xizmat ko&#39;rsatuvchi iste&#39;molchi sartaroshxonada yoki samolyot o&#39;rindig&#39;ida o&#39;tirishi kerak. Shunga mos ravishda, sartarosh yoki uchuvchi xizmatni ko&#39;rsatish uchun navbati bilan do&#39;konda yoki samolyotda bo&#39;lishi kerak.</p>	<p>Неосязаемость<br />\r\nУслуги по определению нематериальны. Они не производятся, не перевозятся и не хранятся.</p>\r\n\r\n<p>Нельзя хранить услуги для будущего использования. Они производятся и потребляются одновременно.</p>\r\n\r\n<p>Бренность<br />\r\nУслуги скоропортящиеся в двух отношениях:</p>\r\n\r\n<p>Ресурсы, процессы и системы, относящиеся к сервису, назначаются для оказания услуг в течение определенного периода времени. Если потребитель услуги не запрашивает и не использует услугу в течение этого периода, соответствующие ресурсы могут остаться неиспользованными. С точки зрения поставщика услуг, это упущенная возможность для бизнеса, если нет другого использования этих ресурсов. Примеры: парикмахер обслуживает другого клиента. Свободное место в самолете нельзя заполнить после вылета.<br />\r\nКогда услуга полностью предоставлена ​​потребителю, эта услуга безвозвратно исчезает. Пример: пассажир был доставлен в пункт назначения.<br />\r\nПоставщик услуг должен предоставить услугу в то время, когда услуга была потреблена. Услуга не проявляется в физическом объекте, независимом от поставщика. Потребитель услуги также неотделим от оказания услуги. Примеры: Потребитель услуги должен сидеть в кресле парикмахера или в кресле самолета. Соответственно, парикмахер или пилот должны находиться в магазине или в самолете соответственно, чтобы оказывать услугу.</p>	<h3>Intangibility[<a href="https://en.wikipedia.org/w/index.php?title=Service_(economics)&amp;action=edit&amp;section=2" title="Edit section: Intangibility">edit</a>]</h3>\r\n\r\n<p>Services are by definition intangible. They are not manufactured, transported or stocked.</p>\r\n\r\n<p>One cannot store services for future use. They are produced and consumed simultaneously.</p>\r\n\r\n<h3>Perishability[<a href="https://en.wikipedia.org/w/index.php?title=Service_(economics)&amp;action=edit&amp;section=3" title="Edit section: Perishability">edit</a>]</h3>\r\n\r\n<p>Services are perishable in two regards:</p>\r\n\r\n<ul>\r\n\t<li>Service-relevant resources, processes, and systems are assigned for service delivery during a specific period in time. If the service consumer does not request and consume the service during this period, the related resources may go unused. From the perspective of the service provider, this is a lost business opportunity if no other use for those resources is available. Examples: A hairdresser serves another client. An empty seat on an airplane cannot be filled after departure.</li>\r\n\t<li>When the service has been completely rendered to the consumer, this particular service irreversibly vanishes. Example: a passenger has been transported to the destination.</li>\r\n</ul>\r\n\r\n<p>The service provider must deliver the service at the exact time of service consumption. The service is not manifested in a physical object that is independent of the provider. The service consumer is also inseparable from service delivery. Examples: The service consumer must sit in the hairdresser&#39;s chair, or in the airplane seat. Correspondingly, the hairdresser or the pilot must be in the shop or plane, respectively, to deliver the service.</p>	\N	15	28	1	1	2020-12-04 11:40:43	2020-12-04 11:40:43
19	Kontaktlar	Контакты	Contacts	Kontaktlar	Контакты	Contacts	contacts	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>\r\n\r\n<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	2	22	23	1	1	2020-12-04 16:28:47	2020-12-04 16:28:47
20	Xizmat markazi	Сервисный центр	Service Center	Xizmat markazi	Сервисный центр	Service Center	servicecenter	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>\r\n\r\n<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	2	24	25	1	1	2020-12-04 16:30:03	2020-12-04 16:30:03
17	Yuridik shaxslarga sotish	Продажа юридическим лицам	Sale to legal entities	Yuridik shaxslarga sotish	Продажа юридическим лицам	Sale to legal entities	sddfasdf	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>\r\n\r\n<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	5	38	39	1	1	2020-12-04 16:26:08	2020-12-04 16:26:08
6	Tenderlar	Тендеры	Tenders	Tenderlar	Тендеры	Tenders	tenders	Kengashning ehtiyojlari va umidlarini qondirish qobiliyatingiz bilan siz shartnomani yutib olishingiz mumkin. Baholash mezonlari sizning muvaffaqiyatingizning kalitidir. Ular spetsifikatsiya bilan nashr etiladi va har bir mukofot mezonining nisbiy og'irliklari bilan bir qatorda takliflar qanday baholanishini ko'rsatib beradi.	Вы можете выиграть контракт, если сможете удовлетворить потребности и ожидания совета. Критерии оценки - ключ к вашему успеху. Они будут опубликованы вместе со спецификацией и покажут вам, как будут оцениваться предложения, а также относительный вес каждого критерия присуждения.	You can win a contract by your ability to deliver the needs and expectations of the council. The evaluation criteria are the keys to your success. These will be published with the specification and will show you how proposals are going to be evaluated, along with the relative weightings of each award criteria.	<p>Jamoa qiladigan birinchi narsa - har bir da&#39;vogar talab qilingan barcha ma&#39;lumotlarni taqdim etganligi va tanlov tartibsiz emasligiga ishonch hosil qilish. Keyin baholash guruhi tender o&#39;tkazuvchisi barcha mezonlarga javob berganligini tekshiradi.</p>\r\n\r\n<p>Ballar har bir talabgorning har bir mezon bo&#39;yicha qanday ishlashini, narx va sifatni muvozanatlashtirganda, kerak bo&#39;lganda ko&#39;rsatiladi. Bu har bir baholash guruhi a&#39;zosi tomonidan raqamni yozuvchi tomonidan amalga oshiriladi va yozuvlar yozuvchisi o&#39;rtacha ballarni yozadi yoki konsensus asosida amalga oshiriladi. Qanday bo&#39;lmasin, taklif batafsil muhokama qilinadi va har bir mezonni bajarish darajasi to&#39;g&#39;risida fikr almashiladi.</p>	<p>Первое, что делает команда, - это проверяет, предоставил ли каждый участник торгов всю необходимую информацию и что тендер не является нестандартным. Затем оценочная комиссия проверяет, выполнил ли участник торгов все критерии.</p>\r\n\r\n<p>Баллы присваиваются, чтобы указать, как каждый участник торгов работает по каждому из критериев, при необходимости уравновешивая цену и качество. Это будет сделано каждым членом группы оценки, дающим номер, и записывающим устройством записывается среднее значение оценок, или это может быть сделано на основе консенсуса. В любом случае предложение подробно обсуждается, и происходит обмен мнениями относительно того, в какой степени соблюдается каждый критерий.</p>	<p>The first thing the team does is make sure each tenderer has submitted all the information required and that the tender is not irregular. Then the evaluation panel will look to see if the tenderer has addressed all of the criteria.</p>\r\n\r\n<p>Points are given to indicate how each tenderer performs against each of the criteria, balancing price and quality where appropriate. This will be done by each evaluation team member giving a number and the recorder writing down the average of the marks, or it can be done by consensus. Either way, the proposal is discussed in detail and opinions are exchanged as to the extent to which each criterion is met.</p>	5	30	31	1	1	2020-12-04 15:10:23	2020-12-04 15:10:23
14	Veb-saytda reklama	Реклама на сайте	Advertising on the website	Veb-saytda reklama	Реклама на сайте	Advertising on the website	webreklama	Veb Studiya Life Style sizning saytingizning kontekstli reklamalarini Yandex va Google kabi qidiruv tizimlarida professional darajada yaratish, texnik xizmat ko'rsatish va optimallashtirish xizmatlarini taqdim etishdan mamnun.	Веб-студия Life Style рада предоставить профессиональные услуги по созданию, сопровождению и оптимизации контекстной рекламы вашего сайта в поисковых системах, таких как Яндекс и Google.	Web Studio Life Style is pleased to provide professional creation, maintenance and optimization services for contextual advertising of your site on search engines such as Yandex and Google.	<p>Internetdagi turli reklama turlari orasida kontekstli reklama eng samarali hisoblanadi. (birinchi navbatda natijalar tezligi va mukammal sozlash imkoniyati jihatidan). Saytga tashrif buyuruvchilarni tezlik bilan jalb qilish uchun ushbu vosita birinchi navbatda, &nbsp;mazmunan tanlanganligi, reklama qilingan mahsulot yoki xizmatga faqatgina bevosita qiziqqan tarmoq foydalanuvchilari uchun ko&#39;rsatilishi bilan qimmatlidir. Bundan tashqari, kontekstli reklama, ularga kerak bo&#39;lmagan mahsulotning reklamasi sifatida emas, balki odamlarning (sizning potentsial mijozlaringiz) ular tomonidan so&#39;ralgan savoliga javob sifatida qabul qilinadi.&nbsp;&nbsp;</p>\r\n\r\n<p>Kontekstli reklama saytining qulayligi, shuningdek, mintaqaviy tarzda ko&#39;rsatilishi bilan bog&#39;liq. Ya&#39;ni, Yandex yoki Google reklamalarida reklama kerak bo&#39;lgan aniq mintaqada foydalanuvchilarga ko&#39;rsatiladi. Bu hali &nbsp;kontekstli reklamaning barcha afzalliklari emas.&nbsp;&nbsp;&nbsp;&nbsp;</p>	<p>Среди различных видов рекламы в Интернете контекстная реклама является наиболее эффективной. (в первую очередь с точки зрения скорости и отличных возможностей настройки). Для быстрого привлечения посетителей на сайт этот инструмент ценен, прежде всего, потому, что контент выбирается, отображается только для пользователей сети, которые непосредственно заинтересованы в рекламируемом продукте или услуге. Кроме того, контекстная реклама воспринимается не как реклама продукта, который им не нужен, а как ответ на вопрос, который им задают люди (ваши потенциальные клиенты).</p>\r\n\r\n<p>Удобство сайта контекстной рекламы также связано с его региональным представлением. То есть реклама на Яндексе или Гугле показывается пользователям именно в том регионе, где реклама нужна. Это еще не все преимущества контекстной рекламы.</p>	<p>Among the various types of advertising on the Internet, contextual advertising is the most effective. (primarily in terms of speed of results and excellent tuning capability). In order to quickly attract visitors to the site, this tool is valuable primarily because the content is selected, displayed only to network users who are directly interested in the advertised product or service. In addition, contextual advertising is perceived not as an advertisement for a product they don&rsquo;t need, but as an answer to a question people (your potential customers) ask them.</p>\r\n\r\n<p>The convenience of a contextual advertising site is also related to its regional presentation. That is, ads on Yandex or Google are displayed to users in the exact region where the ad is needed. This is not yet all the advantages of contextual advertising.</p>	5	32	33	1	1	2020-12-04 16:18:03	2020-12-04 16:18:03
15	Ijaraga beruvchilar uchun	Арендодателям	For landlords	Ijaraga beruvchilar uchun	Арендодателям	For landlords	arenda	Ijara shartnoma asosida yerga, boshqa tabiiy resurslarga, shuningdek xo‘jalik faoliyatini va o‘zga faoliyatni mustaqil ravishda amalga oshirish uchun ijarachiga zarur bo‘lgan mol-mulkka haq evaziga muddatli egalik qilish va undan foydalanishdan iboratdir.\r\nIjara O‘zbekiston Respublikasi qonun hujjatlarida man etilmagan faoliyatning hamma sohasida mulkchilikning barcha shakl va turidagi mol-mulkiga nisbatan qo‘llanishi mumkin.	Аренда - это владение на определенный срок и пользование землей, другими природными ресурсами, а также имуществом, необходимым арендатору для самостоятельного ведения хозяйственной и иной деятельности.\r\nАренда может применяться ко всем формам и видам имущества во всех сферах деятельности, не запрещенных законодательством Республики Узбекистан.	A lease is a fixed-term possession and use of land, other natural resources, as well as property necessary for the lessee to carry out economic and other activities independently.\r\nLease may be applied to all forms and types of property in all areas of activity not prohibited by the legislation of the Republic of Uzbekistan.	<p>Quyidagilar ijara munosabatlarining obyektlari bo&lsquo;lishi mumkin, chunonchi:<br />\r\nkorxonalar, ayrim ishlab chiqarishlar, sexlar, fermalar, boshqa bo&lsquo;linmalar, tashkilotlar;<br />\r\nayrim binolar, inshootlar, uskunalar, transport vositalari, inventarlar, asboblar, boshqa moddiy boyliklar;<br />\r\ner (qishloq xo&lsquo;jaligi uchun ajratilgan yerlar ijaraga faqatgina qishloq xo&lsquo;jalik mahsulotlari yetishtirish uchun beriladi) va boshqa tabiiy resurslar.<br />\r\nIjaraga topshirishga yo&lsquo;l qo&lsquo;yilmaydigan korxonalar, tashkilotlarning turlari (guruhlari), mulk va tabiiy resurslarning turlari O&lsquo;zbekiston Respublikasi qonun hujjatlari bilan belgilab qo&lsquo;yiladi.</p>\r\n\r\n<p>Quyidagilar ijara munosabatlarining obyektlari bo&lsquo;lishi mumkin, chunonchi:<br />\r\nkorxonalar, ayrim ishlab chiqarishlar, sexlar, fermalar, boshqa bo&lsquo;linmalar, tashkilotlar;<br />\r\nayrim binolar, inshootlar, uskunalar, transport vositalari, inventarlar, asboblar, boshqa moddiy boyliklar;<br />\r\ner (qishloq xo&lsquo;jaligi uchun ajratilgan yerlar ijaraga faqatgina qishloq xo&lsquo;jalik mahsulotlari yetishtirish uchun beriladi) va boshqa tabiiy resurslar.<br />\r\nIjaraga topshirishga yo&lsquo;l qo&lsquo;yilmaydigan korxonalar, tashkilotlarning turlari (guruhlari), mulk va tabiiy resurslarning turlari O&lsquo;zbekiston Respublikasi qonun hujjatlari bilan belgilab qo&lsquo;yiladi.</p>	<p>В аренде могут быть следующие предметы, такие как:<br />\r\nпредприятия, индивидуальные производства, магазины, фермерские хозяйства, другие подразделения, организации;<br />\r\nопределенные здания, сооружения, оборудование, транспортные средства, инвентарь, инструменты, другие материальные ценности;<br />\r\nземля (сельскохозяйственная земля сдается только для сельскохозяйственного производства) и другие природные ресурсы.<br />\r\nВиды предприятий, организаций (групп), виды имущества и природных ресурсов, не допускаемых к сдаче в аренду, определяются законодательством Республики Узбекистан.</p>\r\n\r\n<p>В аренде могут быть следующие предметы, такие как:<br />\r\nпредприятия, индивидуальные производства, магазины, фермерские хозяйства, другие подразделения, организации;<br />\r\nопределенные здания, сооружения, оборудование, транспортные средства, инвентарь, инструменты, другие материальные ценности;<br />\r\nземля (сельскохозяйственная земля сдается только для сельскохозяйственного производства) и другие природные ресурсы.<br />\r\nВиды предприятий, организаций (групп), виды имущества и природных ресурсов, не допускаемых к сдаче в аренду, определяются законодательством Республики Узбекистан.</p>	<p>The following may be leased items, such as:<br />\r\nenterprises, individual productions, shops, farms, other divisions, organizations;<br />\r\ncertain buildings, structures, equipment, vehicles, inventory, tools, other material assets;<br />\r\nland (agricultural land is leased only for agricultural production) and other natural resources.<br />\r\nTypes of enterprises, organizations (groups), types of property and natural resources that are not allowed to be leased shall be determined by the legislation of the Republic of Uzbekistan.</p>\r\n\r\n<p>The following may be leased items, such as:<br />\r\nenterprises, individual productions, shops, farms, other divisions, organizations;<br />\r\ncertain buildings, structures, equipment, vehicles, inventory, tools, other material assets;<br />\r\nland (agricultural land is leased only for agricultural production) and other natural resources.<br />\r\nTypes of enterprises, organizations (groups), types of property and natural resources that are not allowed to be leased shall be determined by the legislation of the Republic of Uzbekistan.</p>	5	34	35	1	1	2020-12-04 16:22:04	2020-12-04 16:22:04
18	Ish o'rinlari	Вакансии	Jobs	Ish o'rinlari	Вакансии	Jobs	jobs	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>\r\n\r\n<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	5	40	41	1	1	2020-12-04 16:27:30	2020-12-04 16:27:30
21	Fikr qoldirish	Оставить комментарий	Leave a comment	Fikr qoldirish	Оставить комментарий	Leave a comment	leavecomment	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>\r\n\r\n<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>\r\n\r\n<p>По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</p>	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	2	26	27	1	1	2020-12-04 16:33:30	2020-12-04 16:33:30
\.


--
-- Data for Name: payments; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.payments (id, name_uz, name_ru, name_en, logo, created_by, updated_by, created_at, updated_at) FROM stdin;
1	Karta orqali	По карте	By card	tzGtANlY6HsfF34P9X7geIyScYAWZo2ZYvvhRvJ0.png	1	1	2020-11-26 10:22:06	2020-11-26 10:22:06
\.


--
-- Data for Name: profiles; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.profiles (user_id, first_name, last_name, birth_date, gender, address, avatar) FROM stdin;
1	Admin	Adminov	1988-04-21	2	Address uz adress uz address address uz	\N
2	User	User	1987-05-22	2	User Address uz adress uz address address uz	\N
7	\N	\N	\N	\N	\N	\N
9	\N	\N	\N	\N	\N	\N
\.


--
-- Data for Name: shop_carts; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_carts (id, user_id, product_id, modification_id, quantity, created_at, updated_at) FROM stdin;
5	9	11	\N	1	2020-12-01 18:23:51	2020-12-01 18:23:51
6	9	21	\N	1	2020-12-01 18:23:51	2020-12-01 18:23:51
\.


--
-- Data for Name: shop_category_brands; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_category_brands (category_id, brand_id) FROM stdin;
11	1
11	2
11	3
11	4
11	10
12	1
12	2
12	3
12	4
13	1
13	2
13	3
10	4
10	10
9	1
9	4
8	1
8	4
8	10
4	5
4	9
4	11
4	8
5	5
5	9
6	9
6	11
7	11
7	8
1	1
1	4
1	7
1	10
14	1
14	2
14	3
14	4
14	12
15	1
15	2
15	3
15	12
16	2
16	12
17	1
17	2
18	1
18	4
18	10
19	6
20	1
20	4
21	4
21	10
22	1
22	4
22	10
23	1
23	4
24	1
25	1
25	4
25	10
26	1
26	4
27	4
27	10
2	4
2	1
\.


--
-- Data for Name: shop_characteristic_categories; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_characteristic_categories (characteristic_id, category_id) FROM stdin;
1	2
5	11
6	11
7	11
8	11
10	11
12	11
15	2
16	2
17	2
19	2
20	2
21	2
22	15
23	15
24	15
25	15
26	15
27	15
28	15
29	15
30	15
31	15
32	15
14	11
14	12
35	2
33	15
34	11
34	12
18	2
13	11
13	12
11	11
11	12
9	11
9	12
\.


--
-- Data for Name: shop_characteristic_groups; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_characteristic_groups (id, name_uz, name_ru, name_en, "order", created_by, updated_by, created_at, updated_at) FROM stdin;
1	Texnik xususiyatlari	Технические характеристики	Specifications	1	1	1	2020-11-26 18:41:19	2020-11-27 15:13:44
6	Umumiy noutbukning texnik xususiyatlari	Общие хaрактеристики ноутбука	General specifications of the laptop	2	1	1	2020-11-27 15:13:44	2020-11-27 15:13:44
5	Televizorning asosiy xususiyatlari	Основные характеристики телевизора	Main characteristics of the TV	3	1	1	2020-11-27 14:46:39	2020-11-27 15:13:44
2	Smartfonning umumiy xususiyatlari	Общие характеристики смартфона	General characteristics of the smartphone	4	1	1	2020-11-27 10:13:17	2020-11-27 15:13:44
3	Smartfon xotirasi va protsessori	Память и процессор смартфона	Smartphone memory and processor	5	1	1	2020-11-27 10:43:35	2020-11-27 15:13:44
4	Smartfon kamerasi	Камера смартфона	Smartphone camera	6	1	1	2020-11-27 10:49:07	2020-11-27 15:13:44
\.


--
-- Data for Name: shop_characteristics; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_characteristics (id, name_uz, name_ru, name_en, group_id, status, type, required, hide_in_filters, created_by, updated_by, created_at, updated_at, main) FROM stdin;
1	Texnik xususiyatlari	Технические характеристики	Specifications	1	2	string	t	t	1	1	2020-11-26 18:42:03	2020-11-26 18:42:16	\N
5	Barmoq izi	Отпечаток пальца	Fingerprint	1	2	string	t	f	1	1	2020-11-27 10:31:36	2020-11-27 10:31:41	\N
6	SIM-kartaning raqami va turi	Количество и тип SIM-карты	Number and type of SIM card	2	2	integer	t	f	1	1	2020-11-27 10:32:26	2020-11-27 10:32:30	\N
7	OS versiyasi	Версия ОС	OS version	2	2	string	t	f	1	1	2020-11-27 10:33:58	2020-11-27 10:34:02	\N
8	Face ID sensori	rДатчик Face ID	Face ID senso	2	2	string	t	f	1	1	2020-11-27 10:34:54	2020-11-27 10:35:14	\N
10	RAM hajmi	Объем оперативной памяти	RAM size	1	2	string	t	f	1	1	2020-11-27 10:46:17	2020-11-27 10:46:24	\N
12	Xotira kartasi uyasi	Слот для карт памяти	Memory card slot	3	2	string	t	f	1	1	2020-11-27 10:48:15	2020-11-27 10:48:19	\N
9	Ichki xotira	Объем встроенной памяти	Built-in memory	3	2	string	t	f	1	1	2020-11-27 10:44:44	2020-12-15 10:30:51	f
33	O'lchamlari	Размеры	Dimensions	6	2	string	f	t	1	1	2020-11-27 15:28:50	2020-12-15 09:37:52	f
15	Devorga o'rnatish	Крепление на стену	Wall Mount	5	2	string	t	f	1	1	2020-11-27 14:47:26	2020-11-27 14:47:31	\N
16	Smart TV	Smart TV	Smart TV	5	2	string	t	f	1	1	2020-11-27 14:48:05	2020-11-27 14:48:10	\N
17	Yorug'lik sensori	Датчик освещенности	Light sensor	5	2	string	t	f	1	1	2020-11-27 14:48:59	2020-11-27 14:49:03	\N
19	Diagonal	Диагональ	Diagonal	5	2	string	t	f	1	1	2020-11-27 14:50:29	2020-11-27 14:50:33	\N
20	Matritsa	Матрица	The matrix	5	2	string	t	f	1	1	2020-11-27 14:51:09	2020-11-27 14:51:14	\N
21	Operatsion tizim	Операционная система	Operating system	5	2	string	t	f	1	1	2020-11-27 14:51:51	2020-11-27 14:51:55	\N
22	Protsessor yadrolari soni	Количество ядер процессора	Number of processor cores	6	2	string	t	f	1	1	2020-11-27 15:15:07	2020-11-27 15:15:11	\N
23	Barmoq izi	Отпечаток пальца	Fingerprint	6	2	string	t	f	1	1	2020-11-27 15:15:57	2020-11-27 15:16:01	\N
24	Orqa yoritilgan klaviatura	Подсветка клавиатуры	Backlit keyboard	6	2	string	t	f	1	1	2020-11-27 15:16:50	2020-11-27 15:16:55	\N
25	Rangi	Цвет	Colour	6	2	string	t	f	1	1	2020-11-27 15:17:36	2020-11-27 15:17:40	\N
26	Diagonalni ko'rsatish	Диагональ дисплея	Display diagonal	6	2	string	t	f	1	1	2020-11-27 15:18:37	2020-11-27 15:20:04	\N
27	Kafolat	Гарантия	Warranty	6	2	string	t	f	1	1	2020-11-27 15:23:29	2020-11-27 15:23:34	\N
28	Kesh xotirasi	Кэш-память	Cache memory	6	2	string	t	f	1	1	2020-11-27 15:24:35	2020-11-27 15:24:38	\N
29	Displey o'lchamlari	Разрешение дисплея	Display resolution	6	2	string	t	f	1	1	2020-11-27 15:25:15	2020-11-27 15:25:19	\N
30	Video karta	Видеокарта	Video card	6	2	string	t	f	1	1	2020-11-27 15:26:06	2020-11-27 15:26:10	\N
31	Markaziy protsessor	Процессор	CPU	6	2	string	t	f	1	1	2020-11-27 15:27:12	2020-11-27 15:27:15	\N
32	Umumiy saqlash hajmi	Общий объем накопителей	Total storage capacity	6	2	string	t	f	1	1	2020-11-27 15:28:02	2020-11-27 15:28:06	\N
35	Test	Test	Test	5	1	color	t	f	1	1	2020-12-08 13:46:16	2020-12-08 13:46:16	t
34	rang	цвет	color	2	2	color	t	t	1	1	2020-12-08 12:09:54	2020-12-15 09:58:16	f
14	Asosiy kamera	Основная камера	Main camera	4	2	string	t	t	1	1	2020-11-27 10:50:54	2020-12-15 10:02:05	t
18	Kafolat	Гарантия	Warranty	5	2	string	t	t	1	1	2020-11-27 14:49:50	2020-12-15 10:04:48	f
13	Old kamera	Фронтальная камера	Front-camera	4	2	string	t	t	1	1	2020-11-27 10:49:45	2020-12-15 10:16:38	f
11	RAM hajmi	Объем оперативной памяти	RAM size	3	2	string	t	f	1	1	2020-11-27 10:47:27	2020-12-15 10:18:01	f
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
1	12	10	\N	\N
2	18	8	\N	\N
3	19	5	\N	\N
5	21	9	\N	\N
6	21	3	\N	\N
7	22	4	\N	\N
8	23	9	\N	\N
9	24	4	\N	\N
10	25	8	\N	\N
11	26	9	\N	\N
12	27	6	\N	\N
13	28	8	\N	\N
14	20	8	\N	\N
15	29	8	\N	\N
16	30	8	\N	\N
17	31	8	\N	\N
\.


--
-- Data for Name: shop_marks; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_marks (id, name_uz, name_ru, name_en, slug, photo, meta_json, created_by, updated_by, created_at, updated_at) FROM stdin;
1	Kredit bo'yicha tovarlar	Товар в кредит	Products on credit	products_on_credit	TxAmRgfmz75DaC9hnLW3QWAuAhzmpUsVhB598zbS.jpg	\N	1	1	2020-11-26 10:14:39	2020-11-26 10:14:39
2	Mebellar	Мебель	Furniture	furniture	DbtyEzO8CGiz2IF1e4DS9y5DVJ4cw3Ocpzok66IP.jpeg	\N	1	1	2020-11-26 10:16:32	2020-11-26 10:16:32
3	Xitoyda ishlab chiqarilgan	Сделано в Китае	Made in China	madeinchina	LIPKRRVbHt36kChtjoLnK9H5ezPZw2lWXc7geIFU.png	\N	1	1	2020-12-07 16:35:14	2020-12-07 16:35:14
4	Poyafzal va sumkalar	Обувь и сумки	Shoes & Bags	shoes_bags	dv20KfTbLlWB5UmdyH0fTcQNf37wnFB3sU0tmKkw.png	\N	1	1	2020-12-07 16:38:56	2020-12-07 16:38:56
5	Yaponiya o'yinchoqlar assotsiatsiyasi	Японская ассоциация игрушек	Japan Toy Association	st_mark	5isOyxmHAmPNBGMZdhR1nTEfRxj4OTnsxyQLp3JF.png	\N	1	1	2020-12-07 16:41:18	2020-12-07 16:41:18
6	Aralashish bo'yicha ixtiyoriy nazorat kengashi	Добровольный контрольный совет по вмешательству	Voluntary Control Council for Interference	vcci	zFvTjhkr86r8QwlvF9r7DESJt6srO5JzFZPbfU0T.png	\N	1	1	2020-12-07 16:43:35	2020-12-07 16:43:35
7	PSE	PSE	PSE	pse	C81fHcBNHZCNppRKjNAanzEPDVs0H9J5Vqcy03X6.jpg	\N	1	1	2020-12-07 16:45:33	2020-12-07 16:45:33
8	Koreya sinov laboratoriyasi	Корейская испытательная лаборатория	The Korea Testing Laboratory	ktl	mle1lsGMH9QmAgXGYrIpRfeBHWOpIaUUMhBbosvI.png	\N	1	1	2020-12-07 16:47:07	2020-12-07 16:47:07
9	PSB	PSB	PSB	psb	E03LT2O43FRp7Ag2UiPYnd9MX4XVVzanFnjp3zPl.png	\N	1	1	2020-12-07 16:48:50	2020-12-07 16:48:50
10	Sanoat bo'yicha davlat organi	Государственный орган для промышленности	Public Authority for Industry	pai	g7W5gq8eumY0EHJxbnS8CyolRUKVbYMHmiJmn3Od.png	\N	1	1	2020-12-07 16:51:02	2020-12-07 16:51:02
11	Nemko Evropa	Немко Европа	Nemko Europe	nemko	Sz6DERWDcLrRkvi1mBNxu9wtBCoaz8CBSfL06Gxc.jpeg	\N	1	1	2020-12-07 16:55:43	2020-12-07 16:55:43
12	BEAB	BEAB	BEAB	beab	qPlLOxhs7B1dFFmsFXU8KhiqyQKgPpUJo81ywzVf.png	\N	1	1	2020-12-07 16:58:51	2020-12-07 16:58:51
13	ASTA	ASTA	ASTA	asta	YtM1n84YEomGxTFma2nBJqwPHBHm7SK0ADvLriCe.png	\N	1	1	2020-12-07 17:00:45	2020-12-07 17:00:45
14	SATRA sinov uskunalari va laboratoriya akkreditatsiyasi	Аккредитация испытательного оборудования и лабораторий SATRA	SATRA Test Equipment and Laboratory Accreditation	satra	rM4MveL2RBPshLT6jFlR50ffeDo80wk5PSJV4y12.png	\N	1	1	2020-12-07 17:02:46	2020-12-07 17:02:46
15	KEMA	KEMA	KEMA	kema	2hGspkdlsvSY8jZgbSVBrILo7DiqQy1F9qHILnH0.png	\N	1	1	2020-12-07 17:04:16	2020-12-07 17:04:16
16	SEV	SEV	SEV	sev	0EP3d7ONLYpYtM9zpJ9NWbeM5B5bjNCW4e03CNrl.jpg	\N	1	1	2020-12-07 17:06:11	2020-12-07 17:06:11
17	VDE	VDE	VDE	vde	nCsS1NajZldQ53q1OyT4CSea08kDcXA7r0WIRwaU.png	\N	1	1	2020-12-07 17:07:33	2020-12-07 17:07:33
18	FCC	FCC	FCC	fcc	Jhloonhp1ty1MbPJ6r4oHChAmLm8SxXRkR0p9o4I.png	\N	1	1	2020-12-07 17:09:06	2020-12-07 17:09:06
19	UL	UL	UL	ul	JcVaYRti2wf75hFMkMEAnS4HJsm5zOvbeuBpkduM.png	\N	1	1	2020-12-07 17:10:51	2020-12-07 17:10:51
20	Group mahsulotni global sinovdan o'tkazish va sertifikatlashni ta'minlaydi	Группа проводит глобальные испытания и сертификацию продукции	Group provides global product testing and certification	csa	zcIEwHQVYh2sJxTFa8XcSNZCKr5uc0jfpD2WzTPm.png	\N	1	1	2020-12-07 17:12:40	2020-12-07 17:12:40
\.


--
-- Data for Name: shop_modifications; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_modifications (id, product_id, name_uz, name_ru, name_en, code, characteristic_id, price_uzs, price_usd, value, photo, sort, created_by, updated_by, created_at, updated_at) FROM stdin;
33	3	RTX	RTX	RTX	3070	30	13396032	1293	RTX-3070	\N	2	1	1	2020-12-15 15:19:01	2020-12-15 15:19:01
9	23	Garantiya	Гарантия	Warranty	0123	18	14500600	1350	1	\N	1	1	1	2020-12-14 10:23:20	2020-12-14 16:11:29
14	23	Diagonal	Диагональ	Diagonal	132	19	14358000	1400	55"	\N	2	1	1	2020-12-14 16:05:14	2020-12-14 16:11:29
15	23	Matritsa	Матрица	Matrix	186	20	14358000	1400	IPS	\N	3	1	1	2020-12-14 16:07:59	2020-12-14 16:11:29
16	23	Diagonal	Диагональ	Diagonal	1863	19	16000000	1550	60"	\N	4	1	1	2020-12-14 16:11:29	2020-12-14 16:12:54
24	24	Rangi	Цвет	Color	42342	34	12576000	1200	#f5f2f2	\N	2	1	1	2020-12-15 09:49:54	2020-12-15 10:23:48
25	24	Rangi	Цвет	Color	634	34	12414600	1200	#1f1d1d	\N	3	1	1	2020-12-15 09:56:30	2020-12-15 10:23:48
26	24	Old kamera	Фронтальная камера	Front-camera	624344	13	12576000	1200	10MP	\N	4	1	1	2020-12-15 10:07:54	2020-12-15 10:23:48
28	24	RAM hajmi	Объем оперативной памяти	RAM size	3425	11	11000000	1050	4GB	\N	5	1	1	2020-12-15 10:19:50	2020-12-15 10:23:48
27	24	RAM hajmi	Объем оперативной памяти	RAM size	6435634	11	12414600	1200	8GB	\N	6	1	1	2020-12-15 10:12:40	2020-12-15 10:23:48
29	24	Ichki xotira	Объем встроенной памяти	Built-in memory	198453	9	11500000	1075	128GB	\N	7	1	1	2020-12-15 10:22:38	2020-12-15 10:23:48
12	34	Lenovo Laptop	Lenovo Laptop	Lenovo Laptop	0145	31	15000000	1450	core i5-7700HQ	\N	1	1	1	2020-12-14 14:29:01	2020-12-14 14:29:01
13	32	Realme 6i smartphone red	Realme 6i smartphone red	Realme 6i smartphone red	1	34	7500000	750	#fc0000	\N	1	1	1	2020-12-14 14:38:56	2020-12-14 14:38:56
30	24	Ichki xotira	Объем встроенной памяти	Built-in memory	3254	9	12576000	1200	256GB	\N	8	1	1	2020-12-15 10:23:48	2020-12-15 10:23:48
17	2	O'lchamlari	Размеры	Dimensions	49489	33	25449930	2400	304.1x212.4x16.1 mm	\N	1	1	1	2020-12-14 16:42:32	2020-12-15 15:14:13
18	2	Umumiy saqlash hajmi	Общий объем накопителей	Total storage capacity	41654	32	24428000	2400	256 SSD	\N	2	1	1	2020-12-14 16:48:12	2020-12-15 15:14:13
19	2	Umumiy saqlash hajmi	Общий объем накопителей	Total storage capacity	1564564	32	25449930	2410	512 SSD	\N	3	1	1	2020-12-14 16:49:43	2020-12-15 15:14:13
20	2	Displey o'lchamlari	Разрешение дисплея	Display resolution	3123	29	25442000	2450	2560x1600	\N	4	1	1	2020-12-14 16:51:08	2020-12-15 15:14:13
21	2	Diagonalni ko'rsatish	Диагональ дисплея	Display diagonal	365462	26	25442000	2450	13.3"	\N	5	1	1	2020-12-14 16:53:01	2020-12-15 15:14:13
22	2	Protsessor	Процессор	Processor	74235	31	25442000	2450	Intel Core i7	\N	6	1	1	2020-12-14 16:55:00	2020-12-15 15:14:13
31	2	RTX	RTX	RTX	111	30	26449930	2553	RTX-2060	\N	7	1	1	2020-12-15 15:14:13	2020-12-15 15:14:13
23	24	Asosiy kamera	Основная камера	Main camera	98465	14	12576000	1200	108MP+12MP+12MP	\N	1	1	1	2020-12-15 09:46:59	2020-12-15 10:23:48
32	3	RTX	RTX	RTX	3090	30	13801740	1332	RTX-3090	\N	1	1	1	2020-12-15 15:15:58	2020-12-15 15:19:01
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
1	1	iHppLhLpW191E4uln7JfLeL29wk0xFavb6XsLJqP.jpg	1	1	1	2020-11-26 16:00:51	2020-11-26 16:00:51
2	2	JLuQ7wtCqho7E8FelwnR2LtVDWQNindeAAsjEG1T.jpg	1	1	1	2020-11-26 16:04:40	2020-11-26 16:04:40
3	4	oRmUmNI6qa4nPgRaoj4lWZ9N2FzPRk76TGzUlEaS.jpg	1	1	1	2020-11-26 16:26:40	2020-11-26 16:26:40
4	3	Sl5fRkTgfbxHnh28aInb15PLgZXndLPNzLv40lrJ.jpg	1	1	1	2020-11-26 16:27:30	2020-11-26 16:27:30
5	5	NdzQP87eYNc1OvKZanjOy0SXgXKt0Oerxmywjqru.jpg	1	1	1	2020-11-26 16:45:03	2020-11-26 16:45:03
6	6	JFCOqlHEs3p2n3hDkA93qZDaZJMAv3zFhFcrigLN.jpg	1	1	1	2020-11-26 16:47:52	2020-11-26 16:47:52
7	7	i42Osh4Udv8rAfzmX6CKCAT7MP7IOAk5sNpuFcyA.jpg	1	1	1	2020-11-26 16:52:39	2020-11-26 16:52:39
8	8	bWHZ7TON0CHlbHyfbBpvOWR6PvcK9l7anXGPPqtI.jpg	1	1	1	2020-11-26 16:58:33	2020-11-26 16:58:33
9	9	0gHqK9oFndciirjMrn2AH7qpV224alzxgNYhMogj.jpg	1	1	1	2020-11-26 17:02:15	2020-11-26 17:02:15
10	10	cI8EQURk6p176y2L9yf77AyQI3V5QwemX8jWl59b.jpg	1	1	1	2020-11-26 17:20:48	2020-11-26 17:20:48
11	11	OrG0gLr8GcrbfA0yOKtTOSyoHeWrNae9xJzRtr5c.jpg	1	1	1	2020-11-26 17:23:18	2020-11-26 17:23:18
12	12	Iui86OqsYWVhsOWqMpt21lI7wrCC7WQjedE8tphQ.jpg	1	1	1	2020-11-26 17:28:36	2020-11-26 17:28:36
13	13	fbn8EqEGSmliKy8DSqeCjnBQMZfqeV9sG1oPGP4J.jpg	1	1	1	2020-11-26 17:31:23	2020-11-26 17:31:23
14	14	221SBKQGABaBI3uMSW1YorVJa5hb9eM6rY4hxteB.jpg	1	1	1	2020-11-26 17:35:46	2020-11-26 17:35:46
15	15	h67bRiipqvuj2xKTGPIyouuz9lML9kUQtkwh5Z6B.jpg	1	1	1	2020-11-26 17:37:57	2020-11-26 17:37:57
16	16	v4fWs0OXzLrOS9xq9Vjvca7Op8ZNkuX1VCktVoeD.jpg	1	1	1	2020-11-26 17:57:51	2020-11-26 17:57:51
17	17	Xeaf45yuGjPu161b3dcXqssB091JwoWdcy2V2SFu.jpg	1	1	1	2020-11-26 18:00:05	2020-11-26 18:00:05
18	18	X8b3z2SQF6rIvIjmPLgBF9AayaftQmPhV7Y1s0ae.jpg	1	1	1	2020-11-26 18:04:23	2020-11-26 18:04:23
19	19	MUgreQylJNfIw3YTcpNG8oUmD5cEfThxXO5eF9BV.jpg	1	1	1	2020-11-26 18:06:39	2020-11-26 18:06:39
20	20	UTFKRkCspOUxPwz8eBi57rUEI0fFM1N9gUFBbsEj.jpg	1	1	1	2020-11-26 18:10:37	2020-11-26 18:10:37
21	21	r7kcwH6PPDt9wJsDMj1GzQeyeoVHV64iapwlRrmG.jpg	1	1	1	2020-11-26 18:14:02	2020-11-26 18:14:02
22	22	21vgarwX0CSF0av8lKY3RzQsAWqZdM2aDmWgsy1H.jpg	1	1	1	2020-11-26 18:20:34	2020-11-26 18:20:34
23	23	ImrO7W061fiot1Y5nThHE1GQBBJfWx7QA8KVNRMA.jpg	1	1	1	2020-11-26 18:32:41	2020-11-26 18:32:41
34	24	P1KwVgtQjC3sRfeYT3cP5yqOwmGfHjgCv8STPw5U.jpg	3	1	1	2020-11-26 18:56:39	2020-11-26 18:56:39
35	25	mUWTWoeWIyoIgWWJPRh16YCe8ysEKZDdnevN4jbu.jpg	1	1	1	2020-12-09 16:55:10	2020-12-09 16:55:10
36	25	pWe1C1hZW7JuDIlX1nxzcMVmsafIv9QEYjBvwu5F.jpeg	1	1	1	2020-12-09 16:56:04	2020-12-09 16:56:04
37	26	5PXF2GLtpMQGshQd2MJUTv1DTAFmIdGYud0VDCXC.jpeg	1	1	1	2020-12-09 16:58:34	2020-12-09 16:58:34
38	28	XLf6yv0H6OMtf4jvDPG36IoYoX4jKK7YMVT67ils.jpeg	1	1	1	2020-12-10 11:15:19	2020-12-10 11:15:19
39	29	5O6I45NbI3zE4K8dPLYhpFRbut7opkNdaRjcKYnj.jpg	1	1	1	2020-12-10 11:19:27	2020-12-10 11:19:27
40	30	mvQvAufH3xoFntQPTyVgsMhB7HFZ9hpEMlWpQZzx.jpg	1	1	1	2020-12-10 11:34:53	2020-12-10 11:34:53
41	31	T4bko1bmEFvQ6bnkisoB3hXdolW4rOmvYa2EOYUK.jpg	1	1	1	2020-12-10 11:41:00	2020-12-10 11:41:00
42	32	Y2sn09PkWschDHanOfMpOIv0zfpJ4XgUFVjLBcJL.jpg	1	1	1	2020-12-10 11:52:31	2020-12-10 11:52:31
43	33	h08EF3Vj5Sn89HumDbaM3UsdYe0X56IOkV8Vsfxs.jpg	1	1	1	2020-12-10 11:55:58	2020-12-10 11:55:58
44	34	ipD0cItAAEWYLEX5xin6eRw6IuLhtjYc2z56GLiL.jpg	1	1	1	2020-12-10 11:59:10	2020-12-10 11:59:10
45	35	OR9Fl7YKdcSeFEhybUi9VQc9NpOpVJtpwYBhIAvI.jpg	1	1	1	2020-12-10 12:03:42	2020-12-10 12:03:42
28	2	NmyFqq1UhWWiiIqdxSBPm6z1WDZLfuifMdihcdsW.jpg	2	1	1	2020-11-26 18:51:42	2020-11-26 18:53:06
29	2	VpIs2ss7FeIQvJRO6waSkPlYsgFjs1va9wOI6by6.jpg	3	1	1	2020-11-26 18:51:58	2020-11-26 18:53:06
30	2	uG9VB5Xb7MIz47CKEbcK7LCweh4omJ7mrSsH2eGD.jpg	4	1	1	2020-11-26 18:52:41	2020-11-26 18:53:06
31	2	qalMSntyTl1hUQ3LT0qIghApb0clfEhN5L16h1xF.jpg	5	1	1	2020-11-26 18:53:06	2020-11-26 18:53:06
32	24	JUuuFMfsMlksDSwYpzkqfep784dMxlnm3tDgB1SC.jpg	1	1	1	2020-11-26 18:56:19	2020-11-26 18:56:19
33	24	QfCcNYOwGunNPHxyemteOuI9GoO1HgCc3PJgrhZq.jpg	2	1	1	2020-11-26 18:56:30	2020-11-26 18:56:39
46	36	uSd0qSHsLZQbiWVjYJyF2GlAnQXPgWQkcLwsbyoN.jpg	1	1	1	2020-12-10 14:25:10	2020-12-10 14:25:10
47	37	WaYZzJRozp7UitArYLwf1uSEazpyyysssqeTFy0M.jpg	1	1	1	2020-12-10 14:27:59	2020-12-10 14:27:59
24	23	LlUKOTbxGBok14fiKMGBD8Czf7g6iGzsJUM3Iz2e.jpg	2	1	1	2020-11-26 18:33:39	2020-12-14 16:03:15
25	23	Kn9ovbqBRRW2Ozshrq5Ymw3N2lp9gNwc90U4bLPt.jpg	3	1	1	2020-11-26 18:33:50	2020-12-14 16:03:15
27	23	Iu13rrVHfzzOkC8Vgxb9KYegyjmrG4lT78AelhOR.jpg	4	1	1	2020-11-26 18:34:08	2020-12-14 16:03:15
26	23	urdTdSc2AorkINZbJMurGcXxotB3lRk44iLrM6QL.jpg	5	1	1	2020-11-26 18:34:00	2020-12-14 16:03:15
\.


--
-- Data for Name: shop_product_categories; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_product_categories (product_id, category_id) FROM stdin;
1	15
11	4
22	18
8	14
4	14
3	14
9	14
7	14
5	14
6	14
17	11
21	11
18	11
19	11
20	11
16	11
13	8
14	8
15	8
12	4
10	4
25	4
26	4
27	2
28	4
29	4
30	18
31	8
32	11
33	11
34	14
35	1
36	25
37	25
23	1
2	14
24	11
\.


--
-- Data for Name: shop_product_discounts; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_product_discounts (id, product_id, discount_id, created_at, updated_at) FROM stdin;
25	1	10	2020-11-30 12:05:13	2020-11-30 12:05:13
32	11	10	2020-12-01 10:35:42	2020-12-01 10:35:42
33	22	10	2020-12-01 10:36:05	2020-12-01 10:36:05
35	8	10	2020-12-01 10:36:45	2020-12-01 10:36:45
36	4	10	2020-12-01 10:37:08	2020-12-01 10:37:08
37	3	10	2020-12-01 10:37:27	2020-12-01 10:37:27
38	9	10	2020-12-01 10:37:44	2020-12-01 10:37:44
39	7	10	2020-12-01 10:38:02	2020-12-01 10:38:02
40	5	10	2020-12-01 10:38:26	2020-12-01 10:38:26
41	6	10	2020-12-01 10:38:49	2020-12-01 10:38:49
42	17	10	2020-12-01 10:39:08	2020-12-01 10:39:08
43	21	10	2020-12-01 10:39:32	2020-12-01 10:39:32
45	18	10	2020-12-01 10:40:17	2020-12-01 10:40:17
46	19	10	2020-12-01 10:40:38	2020-12-01 10:40:38
47	20	10	2020-12-01 10:41:07	2020-12-01 10:41:07
48	16	10	2020-12-01 10:41:25	2020-12-01 10:41:25
49	13	10	2020-12-01 10:41:42	2020-12-01 10:41:42
50	14	10	2020-12-01 10:42:00	2020-12-01 10:42:00
51	15	10	2020-12-01 10:42:18	2020-12-01 10:42:18
52	12	10	2020-12-01 10:42:36	2020-12-01 10:42:36
53	10	10	2020-12-01 10:42:55	2020-12-01 10:42:55
55	25	8	2020-12-02 15:11:30	2020-12-02 15:11:30
56	26	5	2020-12-04 11:30:00	2020-12-04 11:30:00
57	27	5	2020-12-08 13:47:50	2020-12-08 13:47:50
59	28	5	2020-12-10 11:14:07	2020-12-10 11:14:07
60	29	5	2020-12-10 11:19:12	2020-12-10 11:19:12
61	30	8	2020-12-10 11:34:37	2020-12-10 11:34:37
62	31	8	2020-12-10 11:40:45	2020-12-10 11:40:45
63	32	8	2020-12-10 11:52:17	2020-12-10 11:52:17
64	33	8	2020-12-10 11:55:40	2020-12-10 11:55:40
65	34	8	2020-12-10 11:58:53	2020-12-10 11:58:53
66	35	8	2020-12-10 12:03:23	2020-12-10 12:03:23
67	36	8	2020-12-10 14:24:47	2020-12-10 14:24:47
68	37	8	2020-12-10 14:27:44	2020-12-10 14:27:44
69	23	10	2020-12-14 16:06:08	2020-12-14 16:06:08
71	2	10	2020-12-14 16:46:07	2020-12-14 16:46:07
72	24	10	2020-12-15 09:53:56	2020-12-15 09:53:56
\.


--
-- Data for Name: shop_product_marks; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_product_marks (product_id, mark_id) FROM stdin;
1	1
11	1
22	1
8	1
4	1
3	1
9	1
7	1
5	1
6	1
17	1
21	1
18	1
19	1
20	1
16	1
13	1
14	1
15	1
12	1
10	1
25	1
26	1
27	19
28	7
29	16
30	16
31	16
32	18
33	17
34	19
35	7
36	17
37	15
23	1
2	1
24	1
\.


--
-- Data for Name: shop_product_reviews; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_product_reviews (id, product_id, rating, advantages, disadvantages, comment, user_id, created_at, updated_at) FROM stdin;
1	2	4	dsaf	asdf	sdaf	1	2020-11-26 16:30:33	2020-11-26 16:30:33
2	23	2	fsd	fsd	ffg	1	2020-12-04 11:15:44	2020-12-04 11:15:44
\.


--
-- Data for Name: shop_products; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.shop_products (id, name_uz, name_ru, name_en, description_uz, description_ru, description_en, slug, price_uzs, price_usd, discount, discount_ends_at, main_category_id, store_id, brand_id, status, weight, quantity, guarantee, bestseller, new, rating, number_of_reviews, reject_reason, created_by, updated_by, created_at, updated_at, main_photo_id) FROM stdin;
3	Apple MacBook Late 2018	Apple MacBook Late 2018	Apple MacBook Late 2018	<h2>Intel Core i5 12&quot;/8GB/512GB SSD, Gold</h2>	<h2>Intel Core i5 12&quot;/8GB/512GB SSD, Gold</h2>	<h2>Intel Core i5 12&quot;/8GB/512GB SSD, Gold</h2>	apple_macbook_2018	13063000	1200	0.0200000000000000004	2020-12-12 00:00:00	15	12	2	2	2	5	f	f	t	\N	0	\N	1	1	2020-11-26 16:07:19	2020-12-01 10:37:30	4
16	Apple iPhone 12 256GB Blue	Apple iPhone 12 256GB Blue	Apple iPhone 12 256GB Blue	<ul>\r\n\t<li>Версия ОС: iOS 14</li>\r\n\t<li>Объем встроенной памяти: 256GB</li>\r\n\t<li>Датчик Face ID: Есть</li>\r\n</ul>	<ul>\r\n\t<li>Версия ОС: iOS 14</li>\r\n\t<li>Объем встроенной памяти: 256GB</li>\r\n\t<li>Датчик Face ID: Есть</li>\r\n</ul>	<ul>\r\n\t<li>Версия ОС: iOS 14</li>\r\n\t<li>Объем встроенной памяти: 256GB</li>\r\n\t<li>Датчик Face ID: Есть</li>\r\n</ul>	apple4234234	14000000	1300	0.0100000000000000002	2020-12-12 00:00:00	12	12	2	2	0.200000000000000011	10	t	t	t	\N	0	\N	1	1	2020-11-26 17:57:39	2020-12-01 10:41:28	16
11	Excel shoes LM01	Excel shoes LM01	Excel shoes LM01	<h2>LM01, Black</h2>	<h2>LM01, Black</h2>	<h2>LM01, Black</h2>	excel_shoes_lm01	520000	50	0.0200000000000000004	2020-12-21 00:00:00	5	12	5	2	0.5	10	t	t	t	\N	0	\N	1	1	2020-11-26 17:23:06	2020-12-01 10:35:46	11
9	Видеокарта Asus	Видеокарта Asus	Видеокарта Asus	<h2>TUF-GTX1660-O6G Gaming</h2>	<h2>TUF-GTX1660-O6G Gaming</h2>	<h2>TUF-GTX1660-O6G Gaming</h2>	asus_vga	3300000	310	0.0100000000000000002	2020-12-12 00:00:00	17	12	4	2	0.800000000000000044	10	f	t	t	\N	0	\N	1	1	2020-11-26 17:02:02	2020-12-01 10:37:47	9
8	Видеокарта Asus VGA CARD	Видеокарта Asus VGA CARD	Видеокарта Asus VGA CARD	<h2>ASUS ROG-STRIX-RTX2080TI-O11G-GAMING</h2>	<h2>ASUS ROG-STRIX-RTX2080TI-O11G-GAMING</h2>	<h2>ASUS ROG-STRIX-RTX2080TI-O11G-GAMING</h2>	asus_vga1	18000000	1700	0.0100000000000000002	2020-12-12 00:00:00	17	12	3	2	0.599999999999999978	10	t	f	t	\N	0	\N	1	1	2020-11-26 16:58:20	2020-12-01 10:36:49	8
15	Samsung SC5630	Samsung SC5630	Samsung SC5630	<p>SC5630</p>	<p>SC5630</p>	<p>SC5630</p>	samsungfdasfasdf	784000	75	0.0100000000000000002	2020-12-12 00:00:00	10	12	1	2	9	10	f	t	t	\N	0	\N	1	1	2020-11-26 17:37:41	2020-12-01 10:42:22	15
4	Моноблок Acer Aspire	Моноблок Acer Aspire	Моноблок Acer Aspire	<h2>S24-880D TFT 23,8&quot; 16/2000GB</h2>	<h2>S24-880D TFT 23,8&quot; 16/2000GB</h2>	<h2>S24-880D TFT 23,8&quot; 16/2000GB</h2>	monoblock_acer_aspire	13063000	1200	0.0200000000000000004	2020-12-12 00:00:00	16	12	12	2	10	2	t	f	t	\N	0	\N	1	1	2020-11-26 16:20:41	2020-12-01 10:37:12	3
13	Пылесос LG	Пылесос LG	Пылесос LG	<h2>VC83209UHAS</h2>	<h2>VC83209UHAS</h2>	<h2>VC83209UHAS</h2>	lg_213123	1980000	180	0.0299999999999999989	2020-02-02 12:00:00	10	12	4	2	7	10	t	t	t	\N	0	\N	1	1	2020-11-26 17:31:09	2020-12-01 10:41:46	13
12	Salamander 21	Salamander 21	Salamander 21	<h2>Black 42</h2>	<h2>Black 42</h2>	<h2>Black 42</h2>	salamander3123123	265000	24	0.0100000000000000002	2020-12-12 00:00:00	5	12	11	2	1	10	f	t	t	\N	0	\N	1	1	2020-11-26 17:28:24	2020-12-01 10:42:41	12
5	Моноблок Acer Aspire	Моноблок Acer Aspire	Моноблок Acer Aspire	<h2>C22-865B TFT 21,5&quot; 8/1000GB</h2>	<h2>C22-865B TFT 21,5&quot; 8/1000GB</h2>	<h2>C22-865B TFT 21,5&quot; 8/1000GB</h2>	monoblock_acer	14000000	1300	0.0200000000000000004	2020-12-12 00:00:00	16	12	12	2	10	5	t	t	t	\N	0	\N	1	1	2020-11-26 16:44:49	2020-12-01 10:38:33	5
10	Excel shoes	Excel shoes	Excel shoes	<h2>MP01, Black</h2>	<h2>MP01, Black</h2>	<h2>MP01, Black</h2>	excel_shoes	480000	45	0.0100000000000000002	2020-12-21 00:00:00	5	12	5	2	1	10	t	f	t	\N	0	\N	1	1	2020-11-26 17:20:24	2020-12-01 10:43:01	10
14	Samsung SC5610	Samsung SC5610	Samsung SC5610	<h2>SC5610 White</h2>	<h2>SC5610 White</h2>	<h2>SC5610 White</h2>	samsung_fsdgdfsg	721000	70	0.0400000000000000008	2021-05-05 00:30:00	10	12	1	2	8	10	t	f	t	\N	0	\N	1	1	2020-11-26 17:35:29	2020-12-01 10:42:03	14
1	Asus X509MA	Asus X509MA	Asus X509MA	<h2>&nbsp;N4020 DDR4 4GB/1TB HDD 15,6&quot;</h2>	<h2>N4020 DDR4 4GB/1TB HDD 15,6&quot;</h2>	<h2>&nbsp;N4020 DDR4 4GB/1TB HDD 15,6&quot;</h2>	asus_x509	4180000	400	0.0100000000000000002	2020-12-01 00:00:00	15	12	2	2	2	5	t	f	t	\N	0	\N	1	1	2020-11-26 16:00:15	2020-11-30 12:05:18	1
23	LG 55UN81006 UHD SmartTV	LG 55UN81006 UHD SmartTV	LG 55UN81006 UHD SmartTV	&lt;p&gt;Kafolat muddati (oy): 12&lt;br /&gt;\r\nSmart TV: Ha&lt;/p&gt;	&lt;p&gt;Гарантийный срок (месяц): 12&lt;/p&gt;\r\n\r\n&lt;p&gt;Smart TV: Есть&lt;/p&gt;	&lt;p&gt;Warranty period (month): 12&lt;br /&gt;\r\nSmart TV: Yes&lt;/p&gt;	smartv	14317000	1350	0.0100000000000000002	2020-12-12 00:00:00	2	12	4	2	10	10	t	t	t	\N	0	\N	1	1	2020-11-26 18:32:25	2020-12-14 16:06:23	23
17	Xiaomi Redmi Note 8 4/64GB (China version) Neptune Blue	Xiaomi Redmi Note 8 4/64GB (China version) Neptune Blue	Xiaomi Redmi Note 8 4/64GB (China version) Neptune Blue	<ul>\r\n\t<li>Версия ОС: Android 9.0</li>\r\n\t<li>Объем встроенной памяти: 64GB</li>\r\n</ul>	<ul>\r\n\t<li>Версия ОС: Android 9.0</li>\r\n\t<li>Объем встроенной памяти: 64GB</li>\r\n</ul>	<ul>\r\n\t<li>Версия ОС: Android 9.0</li>\r\n\t<li>Объем встроенной памяти: 64GB</li>\r\n</ul>	xiomi312312	2050000	190	0.0100000000000000002	2020-12-21 00:00:00	12	12	3	2	0.149999999999999994	10	t	f	t	\N	0	\N	1	1	2020-11-26 17:59:48	2020-12-01 10:39:13	17
22	Комплект садовой мебели Mebel House на 8 персоны	Комплект садовой мебели Mebel House на 8 персоны	Комплект садовой мебели Mebel House на 8 персоны	<p>Производство- Узбекистан<br />\r\nМатериал- Металл, искусственный ротанг, коленное стекло<br />\r\n&nbsp;</p>	<p>Производство- Узбекистан<br />\r\nМатериал- Металл, искусственный ротанг, коленное стекло<br />\r\n&nbsp;</p>	<p>Производство- Узбекистан<br />\r\nМатериал- Металл, искусственный ротанг, коленное стекло<br />\r\n&nbsp;</p>	fasdfasdf	5982000	560	0.0100000000000000002	2020-12-12 00:00:00	19	12	6	2	50	10	t	t	t	\N	0	\N	1	1	2020-11-26 18:20:11	2020-12-01 10:36:09	22
27	dsad	asda	asda	\N	\N	\N	adad	1200000	123213	0	\N	2	19	8	0	\N	\N	f	f	f	\N	0	\N	1	1	2020-12-08 13:47:50	2020-12-08 13:47:50	\N
19	Apple Ipad Air 3 (2019)	Apple Ipad Air 3 (2019)	Apple Ipad Air 3 (2019)	<h2>10.5&quot; 64GB Wi-Fi, Silver</h2>	<h2>10.5&quot; 64GB Wi-Fi, Silver</h2>	<h2>10.5&quot; 64GB Wi-Fi, Silver</h2>	ipad3242341234	6500000	640	0.0100000000000000002	2020-12-12 00:00:00	13	12	2	2	0.5	10	t	t	t	\N	0	\N	1	1	2020-11-26 18:06:12	2020-12-01 10:40:42	19
6	Моноблок Acer Aspire S24-880D	Моноблок Acer Aspire S24-880D	Моноблок Acer Aspire S24-880D	<h2>TFT 23,8&quot; 8/1000GB</h2>	<h2>TFT 23,8&quot; 8/1000GB</h2>	<h2>TFT 23,8&quot; 8/1000GB</h2>	tft_acer_monoblock	10500000	1000	0.0100000000000000002	2020-12-12 00:00:00	16	12	12	2	10	5	t	f	t	\N	0	\N	1	1	2020-11-26 16:47:37	2020-12-01 10:38:53	6
18	Samsung Galaxy Note20 Ultra 256GB Mystic Black	Samsung Galaxy Note20 Ultra 256GB Mystic Black	Samsung Galaxy Note20 Ultra 256GB Mystic Black	<ul>\r\n\t<li>Версия ОС: Android 10.0</li>\r\n\t<li>Объем встроенной памяти: 256GB</li>\r\n\t<li>Датчик Face ID: Есть</li>\r\n</ul>	<ul>\r\n\t<li>Версия ОС: Android 10.0</li>\r\n\t<li>Объем встроенной памяти: 256GB</li>\r\n\t<li>Датчик Face ID: Есть</li>\r\n</ul>	<ul>\r\n\t<li>Версия ОС: Android 10.0</li>\r\n\t<li>Объем встроенной памяти: 256GB</li>\r\n\t<li>Датчик Face ID: Есть</li>\r\n</ul>	samsung4234234	12540000	1180	0	\N	12	12	1	2	0.130000000000000004	10	f	t	t	\N	0	\N	1	1	2020-11-26 18:03:58	2020-12-01 10:40:22	18
7	MSI Nvidia GeForce	MSI Nvidia GeForce	MSI Nvidia GeForce	<h2>RTX2080 Super Ventus XS</h2>	<h2>RTX2080 Super Ventus XS</h2>	<h2>RTX2080 Super Ventus XS</h2>	msi_nvidia_geforce	885000	850	0.0100000000000000002	2020-12-21 00:00:00	17	12	12	2	0.400000000000000022	5	t	t	t	\N	0	\N	1	1	2020-11-26 16:52:25	2020-12-01 10:38:06	7
21	Apple iPad mini 5 Wi-Fi	Apple iPad mini 5 Wi-Fi	Apple iPad mini 5 Wi-Fi	<h2>2019 256GB, Grey</h2>	<h2>2019 256GB, Grey</h2>	<h2>2019 256GB, Grey</h2>	apple3123fsdf	7450000	720	0.0100000000000000002	2020-12-12 00:00:00	13	12	2	2	0.200000000000000011	10	f	t	t	\N	0	\N	1	1	2020-11-26 18:13:29	2020-12-01 10:39:37	21
24	Samsung Galaxy Note20 Ultra 256GB Mystic White Black	Samsung Galaxy Note20 Ultra 256GB Mystic White Black	Samsung Galaxy Note20 Ultra 256GB Mystic White Black	&lt;p&gt;OS versiyasi: Android 10.0&lt;br /&gt;\r\nIchki xotira: 256GB&lt;br /&gt;\r\nFace ID sensori: Ha&lt;/p&gt;	&lt;p&gt;Версия ОС: Android 10.0&lt;br /&gt;\r\nОбъем встроенной памяти: 256GB&lt;br /&gt;\r\nДатчик Face ID: Есть&lt;/p&gt;	&lt;p&gt;OS version: Android 10.0&lt;br /&gt;\r\nBuilt-in Memory: 256GB&lt;br /&gt;\r\nFace ID sensor: Yes&lt;/p&gt;	samsung3fsdjfh324	12540000	1180	0.0100000000000000002	2020-12-12 00:00:00	12	12	1	2	0.299999999999999989	10	t	t	t	\N	0	\N	1	1	2020-11-26 18:55:35	2020-12-15 09:54:02	32
20	Samsung Galaxy Tab A 10.1	Samsung Galaxy Tab A 10.1	Samsung Galaxy Tab A 10.1	<h2>32GB, Black T515</h2>	<h2>32GB, Black T515</h2>	<h2>32GB, Black T515</h2>	samsung42343214	26850000	250	0.0100000000000000002	2020-12-21 00:00:00	13	12	1	2	1	10	t	f	t	\N	0	\N	1	1	2020-11-26 18:10:14	2020-12-01 10:41:10	20
26	Striped Joggers	Striped Joggers	Striped Joggers	&lt;p&gt;Today men&amp;#39;s pants are presented in a variety of options, and therefore everyone can choose a model to their liking and discretion. Designers use ..&lt;/p&gt;	&lt;p&gt;Today men&amp;#39;s pants are presented in a variety of options, and therefore everyone can choose a model to their liking and discretion. Designers use ..&lt;/p&gt;	&lt;p&gt;Today men&amp;#39;s pants are presented in a variety of options, and therefore everyone can choose a model to their liking and discretion. Designers use ..&lt;/p&gt;	striped	52000	4	0.0100000000000000002	2020-11-06 00:00:00	7	19	11	2	1	1	t	t	t	\N	0	\N	1	1	2020-12-04 11:30:00	2020-12-09 16:58:43	37
33	Xiaomi Redmi Note 8 Pro smartfon	Xiaomi Redmi Note 8 Pro smartfon	Xiaomi Redmi Note 8 Pro smartfon	&lt;h1&gt;Xiaomi Redmi Note 8 Pro smartfon&lt;/h1&gt;	&lt;h1&gt;Xiaomi Redmi Note 8 Pro smartfon&lt;/h1&gt;	&lt;h1&gt;Xiaomi Redmi Note 8 Pro smartfon&lt;/h1&gt;	redminote8	1450800	135	0.0100000000000000002	2021-12-12 00:00:00	12	30	3	2	0.299999999999999989	5	t	t	t	\N	0	\N	1	1	2020-12-10 11:55:40	2020-12-10 11:56:07	43
25	ExcelshoesAS01Black	ExcelshoesAS01Black	ExcelshoesAS01Black	&lt;p&gt;Размер: 39-44&lt;br /&gt;\r\nЦвет: темно-синий&lt;br /&gt;\r\nПодошва: EVA&lt;br /&gt;\r\nПроизводитель: Excel&lt;/p&gt;	&lt;p&gt;Размер: 39-44&lt;br /&gt;\r\nЦвет: темно-синий&lt;br /&gt;\r\nПодошва: EVA&lt;br /&gt;\r\nПроизводитель: Excel&lt;/p&gt;	&lt;p&gt;Размер: 39-44&lt;br /&gt;\r\nЦвет: темно-синий&lt;br /&gt;\r\nПодошва: EVA&lt;br /&gt;\r\nПроизводитель: Excel&lt;/p&gt;	as01black	480000	47	0.0100000000000000002	2020-11-02 03:11:00	5	18	11	2	0.5	5	t	t	t	\N	0	\N	1	1	2020-12-02 15:11:30	2020-12-09 16:56:12	36
30	Hand blender Polaris PTB 0204G	Hand blender Polaris PTB 0204G	Hand blender Polaris PTB 0204G	&lt;p&gt;The price is valid only for the online store and may differ from the prices in retail stores&lt;/p&gt;	&lt;p&gt;The price is valid only for the online store and may differ from the prices in retail stores&lt;/p&gt;	&lt;p&gt;The price is valid only for the online store and may differ from the prices in retail stores&lt;/p&gt;	handblender	435000	41	0.0599999999999999978	2021-12-12 00:00:00	22	18	4	2	5	5	t	t	t	\N	0	\N	1	1	2020-12-10 11:34:37	2020-12-10 11:35:00	40
28	Longsleeve	Longsleeve	Longsleeve	&lt;p&gt;Despite the fact that with the word &amp;ldquo;T-shirt&amp;rdquo; a short-sleeved product immediately appears in thoughts, this is not the only option. Models called toda..&lt;/p&gt;	&lt;p&gt;Despite the fact that with the word &amp;ldquo;T-shirt&amp;rdquo; a short-sleeved product immediately appears in thoughts, this is not the only option. Models called toda..&lt;/p&gt;	&lt;p&gt;Despite the fact that with the word &amp;ldquo;T-shirt&amp;rdquo; a short-sleeved product immediately appears in thoughts, this is not the only option. Models called toda..&lt;/p&gt;	longsleeve	35000	3	0.0100000000000000002	2021-12-12 00:00:00	6	19	11	2	1	5	t	t	t	\N	0	\N	1	1	2020-12-10 11:14:07	2020-12-10 11:15:41	38
29	LongSleeved Shirt Regularfit	LongSleeved Shirt Regularfit	LongSleeved Shirt Regularfit	&lt;p&gt;A man in a properly selected shirt always looks dignified and mature. In the wardrobe there should be a place for models for formal meetings and dinne..&lt;/p&gt;	&lt;p&gt;A man in a properly selected shirt always looks dignified and mature. In the wardrobe there should be a place for models for formal meetings and dinne..&lt;/p&gt;	&lt;p&gt;A man in a properly selected shirt always looks dignified and mature. In the wardrobe there should be a place for models for formal meetings and dinne..&lt;/p&gt;	regularfit	79900	7	0.100000000000000006	2021-12-12 00:00:00	6	19	9	2	1	5	t	t	t	\N	0	\N	1	1	2020-12-10 11:19:12	2020-12-10 11:19:35	39
31	Vacuum cleaner Samsung VC18M31B0HN	Vacuum cleaner Samsung VC18M31B0HN	Vacuum cleaner Samsung VC18M31B0HN	&lt;p&gt;Samsung VC18M31B0HN&lt;/p&gt;	&lt;p&gt;Samsung VC18M31B0HN&lt;/p&gt;	&lt;p&gt;Samsung VC18M31B0HN&lt;/p&gt;	vacumsdfasdf	1450000	135	0.0299999999999999989	2021-12-12 00:00:00	10	18	1	2	8	5	t	t	t	\N	0	\N	1	1	2020-12-10 11:40:45	2020-12-10 11:41:07	41
36	Compact camera Canon IXUS 155	Compact camera Canon IXUS 155	Compact camera Canon IXUS 155	&lt;p&gt;Canon IXUS 155&lt;/p&gt;	&lt;p&gt;Canon IXUS 155&lt;/p&gt;	&lt;p&gt;Canon IXUS 155&lt;/p&gt;	fotokameracanon	2145000	210	0.0400000000000000008	2021-12-12 00:00:00	26	20	15	2	0.599999999999999978	5	t	t	t	\N	0	\N	1	1	2020-12-10 14:24:47	2020-12-10 14:25:16	46
32	Realme 6i smartphone	Realme 6i smartphone	Realme 6i smartphone	&lt;p&gt;Realme 6i smartphone&lt;/p&gt;	&lt;p&gt;Realme 6i smartphone&lt;/p&gt;	&lt;p&gt;Realme 6i smartphone&lt;/p&gt;	6iredmi	2033000	195	0.0200000000000000004	2020-11-11 00:00:00	12	30	1	2	0.200000000000000011	5	t	t	t	\N	0	\N	1	1	2020-12-10 11:52:17	2020-12-10 11:52:37	42
34	Lenovo Laptop	Lenovo Laptop	Lenovo Laptop	&lt;p&gt;&amp;nbsp;V155-15API AMD R5-3500U / 4 / 1000GB&lt;/p&gt;	&lt;p&gt;&amp;nbsp;V155-15API AMD R5-3500U / 4 / 1000GB&lt;/p&gt;	&lt;p&gt;&amp;nbsp;V155-15API AMD R5-3500U / 4 / 1000GB&lt;/p&gt;	lenovanotebook	4867000	450	0.0100000000000000002	2021-12-12 00:00:00	15	30	12	2	1	5	t	t	t	\N	0	\N	1	1	2020-12-10 11:58:53	2020-12-10 11:59:16	44
35	Artel UA32H3200	Artel UA32H3200	Artel UA32H3200	&lt;h1&gt;Artel UA32H3200&lt;/h1&gt;	&lt;h1&gt;Artel UA32H3200&lt;/h1&gt;	&lt;h1&gt;Artel UA32H3200&lt;/h1&gt;	arteltv	1450000	138	0.0599999999999999978	2021-12-12 00:00:00	2	20	10	2	10	5	t	t	t	\N	0	\N	1	1	2020-12-10 12:03:23	2020-12-10 12:03:48	45
37	Digital Video Camera Sony PJ270	Digital Video Camera Sony PJ270	Digital Video Camera Sony PJ270	&lt;p&gt;&amp;nbsp;Camera Sony PJ270&lt;/p&gt;	&lt;p&gt;&amp;nbsp;Camera Sony PJ270&lt;/p&gt;	&lt;p&gt;&amp;nbsp;Camera Sony PJ270&lt;/p&gt;	camerasony	4156000	400	0.0100000000000000002	2021-12-12 00:00:00	27	20	7	2	0.900000000000000022	5	t	t	t	\N	0	\N	1	1	2020-12-10 14:27:44	2020-12-10 14:28:05	47
2	Apple MacBook Pro 13 Retina Touch Bar	Apple MacBook Pro 13 Retina Touch Bar	Apple MacBook Pro 13 Retina Touch Bar	&lt;h2&gt;&lt;span style=&quot;font-size:12px&quot;&gt;Mac uchun AppleCare + sizning qamrovingizni AppleCare + sotib olingan kundan boshlab uch yilgacha uzaytiradi va har 12 oyda ikki marta tasodifiy zararni himoya qilish hodisalarini qo&amp;#39;shadi, ularning har biri ekran buzilishi yoki tashqi muhofaza uchun $ 99 xizmat haqi yoki boshqa zarar uchun $ 299, plyus amaldagi soliq&lt;/span&gt;&lt;/h2&gt;	&lt;h2&gt;&lt;span style=&quot;font-size:12px&quot;&gt;AppleCare + для Mac расширяет ваше покрытие до трех лет с даты покупки AppleCare + и добавляет до двух случаев защиты от случайного повреждения каждые 12 месяцев, каждый из которых подлежит оплате за обслуживание в размере 99 долларов США за повреждение экрана или внешнего корпуса или 299 долларов США за другие повреждения. плюс применимый налог&lt;/span&gt;&lt;/h2&gt;	&lt;h2&gt;&lt;span style=&quot;font-size:12px&quot;&gt;AppleCare+ for Mac extends your coverage to three years from your AppleCare+ purchase date and adds up to two incidents of accidental damage protection every 12 months, each subject to a service fee of $99 for screen damage or external enclosure damage, or $299 for other damage, plus applicable tax&lt;/span&gt;&lt;/h2&gt;	applemacboo	25707000	2400	0.0100000000000000002	2020-12-11 00:00:00	15	12	2	2	2	5	t	t	t	\N	0	\N	1	1	2020-11-26 16:04:28	2020-12-14 16:46:15	2
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
12	1
18	4
18	8
18	11
19	4
19	5
19	6
19	7
21	4
21	8
21	22
22	18
23	4
23	8
24	4
24	11
24	14
24	18
25	18
26	4
26	18
27	1
27	8
27	11
27	14
28	4
28	8
20	1
20	11
20	14
20	23
29	19
30	1
30	8
30	11
30	14
30	23
31	4
31	8
31	11
31	18
\.


--
-- Data for Name: store_delivery_methods; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.store_delivery_methods (store_id, delivery_method_id, cost, sort) FROM stdin;
12	1	10000	5
18	1	10000	5
19	1	10000	5
21	1	10000	5
22	1	10000	5
23	1	10000	5
24	1	10000	5
25	1	10000	5
26	1	10000	5
27	1	10000	5
28	1	10000	5
20	1	10000	5
29	1	10000	5
30	1	10000	5
31	1	10000	5
\.


--
-- Data for Name: store_marks; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.store_marks (store_id, mark_id) FROM stdin;
12	2
18	1
19	1
21	18
22	17
23	19
23	3
24	5
25	17
25	7
26	18
26	9
26	4
27	19
28	19
28	4
28	2
20	18
20	16
20	9
29	16
30	18
31	18
\.


--
-- Data for Name: store_payments; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.store_payments (store_id, payment_id) FROM stdin;
12	1
18	1
19	1
21	1
22	1
23	1
24	1
25	1
26	1
27	1
28	1
20	1
29	1
30	1
31	1
\.


--
-- Data for Name: store_users; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.store_users (store_id, user_id, role) FROM stdin;
12	1	administrator
18	1	administrator
19	1	administrator
20	1	administrator
21	1	administrator
22	1	administrator
23	1	administrator
24	1	administrator
25	1	administrator
26	1	administrator
27	1	administrator
28	1	administrator
29	1	administrator
30	1	administrator
31	1	administrator
\.


--
-- Data for Name: stores; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.stores (id, name_uz, name_ru, name_en, slug, logo, status, created_by, updated_by, created_at, updated_at) FROM stdin;
18	Eski shahar makro	Макрос старого города	Old city macro	oldcity	HQIT2kyUR8dASPe7Uu7TJwH4FUVBrwOPGuvzBe4X.png	2	1	1	2020-12-02 15:05:00	2020-12-02 15:05:05
12	Samarqand Darvoza	Самарканд дарвоза	Samarkand darvoza	samarkand_darvoza	YDnvFq2Nuw3InNqtY2FtutpTu9zFVBq6oIljsxlG.png	2	1	1	2020-11-26 15:54:03	2020-12-02 15:41:03
19	VIP BRANDS	VIP BRANDS	VIP BRANDS	vipbrands	N9elfdxrYed2vcEYDpEkK9VKj5IdYJ3vzebcHXTa.png	2	1	1	2020-12-04 11:18:56	2020-12-04 11:19:03
21	KorzinkaUz	KorzinkaUz	KorzinkaUz	korzinkauz	kgNKh5Odgowv7vE4xxHnMkiGb4GhymY1Aji27kbl.png	2	1	1	2020-12-09 17:33:38	2020-12-09 17:33:55
22	KokchaMarket	KokchaMarket	KokchaMarket	kokchamarket	DywXv2oQx9VYFQCsvMcH1tO1U3G3bJSISvYSH9Y5.png	2	1	1	2020-12-10 09:31:53	2020-12-10 09:32:00
23	MegaPlanet	MegaPlanet	MegaPlanet	megaplanet	fO2zjKyjdmUNiyBw7evmbB4jYIVP0VmTstrG76Vv.jpeg	2	1	1	2020-12-10 09:37:03	2020-12-10 09:37:10
24	NextMarket	NextMarket	NextMarket	nextmarket	I1bJjfhYCDaxPAVh8ez7yaaD0Ay9kYfxENZLGhXr.jpg	2	1	1	2020-12-10 09:39:51	2020-12-10 09:39:58
25	SaludMarket	SaludMarket	SaludMarket	saludmarket	uhixJQLTEfWw62sI8omfVRG7I63lxkMm3hMK5sLZ.png	2	1	1	2020-12-10 09:45:21	2020-12-10 09:45:38
26	Kasbino	Kasbino	Kasbino	kasbino	GCYR7NrVVIZsoZKl34NxffNMvOxCEw5sKJLHLhI3.jpeg	2	1	1	2020-12-10 09:48:43	2020-12-10 09:48:51
27	TechnoShop	TechnoShop	TechnoShop	technoshop	XzxX4LJKF4ZVsdQbTheMCTxQ8IbMVBh32OvxhNB1.png	2	1	1	2020-12-10 09:50:56	2020-12-10 09:51:01
28	TokenMarket	TokenMarket	TokenMarket	tokenmarket	xvNPTGnm41kKsEpYvILpnGjqumq7Un8GDwvRBbVh.jpg	2	1	1	2020-12-10 09:52:38	2020-12-10 09:52:44
20	Malika	Malika	Malika	malika	X4RvHgz1eSC40l03YBmYPYlTSIEFUMYA1lh9B536.jpg	2	1	1	2020-12-09 17:30:39	2020-12-10 09:54:26
29	Atlas	Atlas	Atlas	atlas	fZbA8CFcsxnxtOF0pePuVaBHgRPnOVVGy7BWfGhP.jpeg	2	1	1	2020-12-10 09:55:48	2020-12-10 09:55:53
30	MediaPark	MediaPark	MediaPark	mediapark	LEFNUOjiwMCAN3Rjz4Cl6KCszWQ6jEXFiHvH3Tfl.jpeg	2	1	1	2020-12-10 10:14:43	2020-12-10 10:14:50
31	CompassMacro	CompassMacro	CompassMacro	compassmacro	6djlkZ2tWAUO70Dtd7mwA5DtSaUZcku86KfSuoBs.png	2	1	1	2020-12-10 10:18:45	2020-12-10 10:18:52
\.


--
-- Data for Name: user_favorites; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.user_favorites (user_id, product_id) FROM stdin;
1	1
\.


--
-- Data for Name: user_networks; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.user_networks (user_id, network, identity, emails_json, phones_json) FROM stdin;
3	google	104537922165315928317	["1710136.nasriddinbek.bektemirov@gmail.com"]	\N
5	google	116852667327811565568	["a.abdualiym@gmail.com"]	\N
6	telegram	129683416	\N	\N
9	telegram	111065816	\N	\N
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: dev_shop
--

COPY public.users (id, name, email, phone, phone_verified, password, balance, verify_token, phone_verify_token, phone_verify_token_expire, phone_auth, role, status, email_verified_at, remember_token, created_at, updated_at, manager_request_status, email_verified) FROM stdin;
2	user	user@gmail.com	998991234567	f	$2y$10$wc9c1EJjS5Ip3rCa4oE0pujvxflEgUlTJYyc1./zcye9CeBJrU4ZO	0	\N	\N	\N	f	user	9	2020-11-18 14:20:41	2hAYZFPzv7	\N	\N	0	f
3	google_104537922165315928317	1710136.nasriddinbek.bektemirov@gmail.com	\N	f	\N	0	\N	\N	\N	f	user	9	\N	\N	2020-11-26 15:10:42	2020-11-26 15:10:42	0	f
5	google_116852667327811565568	a.abdualiym@gmail.com	998977772129	f	\N	0	\N	27508	2020-11-27 18:23:20	f	user	9	\N	\N	2020-11-27 18:17:03	2020-11-27 18:18:20	0	t
6	telegram_129683416	\N	\N	f	\N	0	\N	\N	\N	f	user	9	\N	\N	2020-11-30 10:59:30	2020-11-30 10:59:30	0	f
7	az11	axrorxojayev@mail.uz	\N	f	$2y$10$QYAWZmeRHSlzEZ/3C8Sm/OSSFDn/psQLSh/jK5wBDRDhUVj4CF9Om	0	3378208c-7fa2-45f6-85ca-267fb67e1599	\N	\N	f	user	0	\N	\N	2020-12-01 10:45:42	2020-12-01 10:45:42	0	f
9	telegram_111065816	\N	\N	f	\N	0	\N	\N	\N	f	user	9	\N	\N	2020-12-01 11:56:57	2020-12-01 11:56:57	0	f
1	admin	admin@gmail.com	\N	f	$2y$10$ryve6eiOgB05r2qA0FGQHOCwHRVCzb.aoHwdjwoRhZ1FIV89qpoMK	0	\N	\N	\N	f	administrator	9	2020-11-18 14:20:41	c6jFnzyQopY65TXABEIuQR9MqlVjRfrAXeILNZyUywpml8JHSmLklvK2ZsPn	\N	\N	0	f
\.


--
-- Name: banners_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.banners_id_seq', 7, true);


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

SELECT pg_catalog.setval('public.brands_id_seq', 17, true);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.categories_id_seq', 27, true);


--
-- Name: delivery_methods_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.delivery_methods_id_seq', 1, true);


--
-- Name: discounts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.discounts_id_seq', 11, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.migrations_id_seq', 52, true);


--
-- Name: pages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.pages_id_seq', 21, true);


--
-- Name: payments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.payments_id_seq', 1, true);


--
-- Name: shop_carts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_carts_id_seq', 21, true);


--
-- Name: shop_characteristic_groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_characteristic_groups_id_seq', 6, true);


--
-- Name: shop_characteristics_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_characteristics_id_seq', 35, true);


--
-- Name: shop_delivery_methods_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_delivery_methods_id_seq', 1, false);


--
-- Name: shop_discounts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_discounts_id_seq', 17, true);


--
-- Name: shop_marks_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_marks_id_seq', 20, true);


--
-- Name: shop_modifications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_modifications_id_seq', 33, true);


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

SELECT pg_catalog.setval('public.shop_photos_id_seq', 47, true);


--
-- Name: shop_product_discounts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_product_discounts_id_seq', 72, true);


--
-- Name: shop_product_reviews_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_product_reviews_id_seq', 3, true);


--
-- Name: shop_products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.shop_products_id_seq', 37, true);


--
-- Name: sliders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.sliders_id_seq', 6, true);


--
-- Name: stores_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.stores_id_seq', 31, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: dev_shop
--

SELECT pg_catalog.setval('public.users_id_seq', 9, true);


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

