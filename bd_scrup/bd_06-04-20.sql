--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.12
-- Dumped by pg_dump version 9.5.12

-- Started on 2020-04-06 13:19:32

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12355)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2331 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 181 (class 1259 OID 29585)
-- Name: animales; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.animales (
    id integer NOT NULL,
    cantidad integer,
    id_censo integer,
    tipo integer
);


ALTER TABLE public.animales OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 29588)
-- Name: animales_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.animales_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.animales_id_seq OWNER TO postgres;

--
-- TOC entry 2332 (class 0 OID 0)
-- Dependencies: 182
-- Name: animales_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.animales_id_seq OWNED BY public.animales.id;


--
-- TOC entry 183 (class 1259 OID 29590)
-- Name: carga_familiar; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carga_familiar (
    id integer NOT NULL,
    id_censo integer NOT NULL,
    id_persona integer NOT NULL
);


ALTER TABLE public.carga_familiar OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 29593)
-- Name: carga_familiar_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.carga_familiar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.carga_familiar_id_seq OWNER TO postgres;

--
-- TOC entry 2333 (class 0 OID 0)
-- Dependencies: 184
-- Name: carga_familiar_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.carga_familiar_id_seq OWNED BY public.carga_familiar.id;


--
-- TOC entry 185 (class 1259 OID 29595)
-- Name: censo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.censo (
    id integer NOT NULL,
    fecha_creacion date NOT NULL,
    id_jefe_familia integer NOT NULL,
    nivel_instruccion integer NOT NULL,
    tipo_institucion integer,
    profesion text,
    nom_inst_laboral text,
    ingreso_mensual integer,
    id_vivienda integer NOT NULL,
    aguas_blancas integer NOT NULL,
    tanques_agua integer NOT NULL,
    aguas_servidas integer NOT NULL,
    gas integer NOT NULL,
    cantidad_bombonas integer NOT NULL,
    sistema_electrico integer NOT NULL,
    planta_electrica integer NOT NULL,
    bombillos_ahorradores integer NOT NULL,
    transporte integer NOT NULL,
    ayuda_familiar character varying,
    eliminado boolean,
    nom_inst_educativa character varying,
    recoleccion_basura integer,
    id_sector integer
);


ALTER TABLE public.censo OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 29601)
-- Name: censo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.censo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.censo_id_seq OWNER TO postgres;

--
-- TOC entry 2334 (class 0 OID 0)
-- Dependencies: 186
-- Name: censo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.censo_id_seq OWNED BY public.censo.id;


--
-- TOC entry 187 (class 1259 OID 29603)
-- Name: discapacidad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.discapacidad (
    id integer NOT NULL,
    descripcion character varying NOT NULL
);


ALTER TABLE public.discapacidad OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 29609)
-- Name: discapacidad_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.discapacidad_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.discapacidad_id_seq OWNER TO postgres;

--
-- TOC entry 2335 (class 0 OID 0)
-- Dependencies: 188
-- Name: discapacidad_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.discapacidad_id_seq OWNED BY public.discapacidad.id;


--
-- TOC entry 189 (class 1259 OID 29611)
-- Name: electrodomesticos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.electrodomesticos (
    id integer NOT NULL,
    nevera integer,
    cocina integer,
    microondas integer,
    lavadora integer,
    televisor integer,
    ventilador_aire integer,
    id_censo integer
);


ALTER TABLE public.electrodomesticos OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 29614)
-- Name: electrodomesticos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.electrodomesticos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.electrodomesticos_id_seq OWNER TO postgres;

--
-- TOC entry 2336 (class 0 OID 0)
-- Dependencies: 190
-- Name: electrodomesticos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.electrodomesticos_id_seq OWNED BY public.electrodomesticos.id;


--
-- TOC entry 191 (class 1259 OID 29616)
-- Name: enfermedad; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.enfermedad (
    id integer NOT NULL,
    descripcion character varying NOT NULL
);


ALTER TABLE public.enfermedad OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 29622)
-- Name: enfemedad_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.enfemedad_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.enfemedad_id_seq OWNER TO postgres;

--
-- TOC entry 2337 (class 0 OID 0)
-- Dependencies: 192
-- Name: enfemedad_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.enfemedad_id_seq OWNED BY public.enfermedad.id;


--
-- TOC entry 193 (class 1259 OID 29624)
-- Name: espacios_vivienda; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.espacios_vivienda (
    id_esp_vivienda integer NOT NULL,
    cocina integer NOT NULL,
    bano integer NOT NULL,
    sala integer NOT NULL,
    habitaciones integer NOT NULL,
    id_censo integer NOT NULL
);


ALTER TABLE public.espacios_vivienda OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 29627)
-- Name: espacios_vivienda_id_esp_vivienda_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.espacios_vivienda_id_esp_vivienda_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.espacios_vivienda_id_esp_vivienda_seq OWNER TO postgres;

--
-- TOC entry 2338 (class 0 OID 0)
-- Dependencies: 194
-- Name: espacios_vivienda_id_esp_vivienda_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.espacios_vivienda_id_esp_vivienda_seq OWNED BY public.espacios_vivienda.id_esp_vivienda;


--
-- TOC entry 219 (class 1259 OID 29890)
-- Name: jornadas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jornadas (
    id integer NOT NULL,
    id_user integer,
    fecha_inicio date,
    fecha_fin date,
    tipo character varying,
    asunto character varying(255),
    estado character varying,
    dirigido character varying,
    observaciones text
);


ALTER TABLE public.jornadas OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 29888)
-- Name: jornadas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jornadas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.jornadas_id_seq OWNER TO postgres;

--
-- TOC entry 2339 (class 0 OID 0)
-- Dependencies: 218
-- Name: jornadas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jornadas_id_seq OWNED BY public.jornadas.id;


--
-- TOC entry 195 (class 1259 OID 29629)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 29632)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 2340 (class 0 OID 0)
-- Dependencies: 196
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 197 (class 1259 OID 29634)
-- Name: paredes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.paredes (
    id_paredes integer NOT NULL,
    id_censo integer NOT NULL,
    tipo integer
);


ALTER TABLE public.paredes OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 29637)
-- Name: paredes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.paredes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.paredes_id_seq OWNER TO postgres;

--
-- TOC entry 2341 (class 0 OID 0)
-- Dependencies: 198
-- Name: paredes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.paredes_id_seq OWNED BY public.paredes.id_paredes;


--
-- TOC entry 199 (class 1259 OID 29639)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 29645)
-- Name: personas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personas (
    id integer NOT NULL,
    nombre character varying,
    apellido character varying,
    cedula integer NOT NULL,
    fecha_nac date,
    estado_civil integer,
    parentesco integer,
    nacionalidad integer,
    sexo integer
);


ALTER TABLE public.personas OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 29651)
-- Name: personas_dis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personas_dis (
    id integer NOT NULL,
    id_discapacidad integer NOT NULL,
    id_persona integer NOT NULL
);


ALTER TABLE public.personas_dis OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 29654)
-- Name: personas_dis_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personas_dis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personas_dis_id_seq OWNER TO postgres;

--
-- TOC entry 2342 (class 0 OID 0)
-- Dependencies: 202
-- Name: personas_dis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personas_dis_id_seq OWNED BY public.personas_dis.id;


--
-- TOC entry 203 (class 1259 OID 29656)
-- Name: personas_enfer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personas_enfer (
    id integer NOT NULL,
    id_enfer integer NOT NULL,
    id_persona integer NOT NULL
);


ALTER TABLE public.personas_enfer OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 29659)
-- Name: personas_enfer_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personas_enfer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personas_enfer_id_seq OWNER TO postgres;

--
-- TOC entry 2343 (class 0 OID 0)
-- Dependencies: 204
-- Name: personas_enfer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personas_enfer_id_seq OWNED BY public.personas_enfer.id;


--
-- TOC entry 205 (class 1259 OID 29661)
-- Name: personas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personas_id_seq OWNER TO postgres;

--
-- TOC entry 2344 (class 0 OID 0)
-- Dependencies: 205
-- Name: personas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personas_id_seq OWNED BY public.personas.id;


--
-- TOC entry 206 (class 1259 OID 29663)
-- Name: plagas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.plagas (
    id integer NOT NULL,
    ratones integer,
    hormigas integer,
    cucarachas integer,
    moscas integer,
    otros text,
    id_censo integer
);


ALTER TABLE public.plagas OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 29669)
-- Name: plagas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.plagas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.plagas_id_seq OWNER TO postgres;

--
-- TOC entry 2345 (class 0 OID 0)
-- Dependencies: 207
-- Name: plagas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.plagas_id_seq OWNED BY public.plagas.id;


--
-- TOC entry 217 (class 1259 OID 29870)
-- Name: sectores; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sectores (
    id_sector integer NOT NULL,
    sector character varying(100),
    activo boolean
);


ALTER TABLE public.sectores OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 29868)
-- Name: sectores_id_sector_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sectores_id_sector_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sectores_id_sector_seq OWNER TO postgres;

--
-- TOC entry 2346 (class 0 OID 0)
-- Dependencies: 216
-- Name: sectores_id_sector_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sectores_id_sector_seq OWNED BY public.sectores.id_sector;


--
-- TOC entry 208 (class 1259 OID 29671)
-- Name: servicios_comunales; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.servicios_comunales (
    id integer NOT NULL,
    otros text,
    id_censo integer,
    mercado integer,
    bodega integer,
    farmacia integer,
    plaza_parque integer
);


ALTER TABLE public.servicios_comunales OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 29677)
-- Name: servicios_comunales_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.servicios_comunales_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.servicios_comunales_id_seq OWNER TO postgres;

--
-- TOC entry 2347 (class 0 OID 0)
-- Dependencies: 209
-- Name: servicios_comunales_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.servicios_comunales_id_seq OWNED BY public.servicios_comunales.id;


--
-- TOC entry 210 (class 1259 OID 29679)
-- Name: techo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.techo (
    id_techo integer NOT NULL,
    id_censo integer NOT NULL,
    tipo integer
);


ALTER TABLE public.techo OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 29682)
-- Name: techo_id_techo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.techo_id_techo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.techo_id_techo_seq OWNER TO postgres;

--
-- TOC entry 2348 (class 0 OID 0)
-- Dependencies: 211
-- Name: techo_id_techo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.techo_id_techo_seq OWNED BY public.techo.id_techo;


--
-- TOC entry 212 (class 1259 OID 29684)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    lastname character varying(255) NOT NULL,
    vat character varying(255) NOT NULL,
    type integer NOT NULL,
    id_sector integer
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 29690)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 2349 (class 0 OID 0)
-- Dependencies: 213
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 214 (class 1259 OID 29692)
-- Name: vivienda; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.vivienda (
    id integer NOT NULL,
    nro_casa integer NOT NULL,
    tipo character varying(255) NOT NULL,
    estado character varying(255) NOT NULL,
    tenencia character varying(255) NOT NULL
);


ALTER TABLE public.vivienda OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 29698)
-- Name: vivienda_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vivienda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vivienda_id_seq OWNER TO postgres;

--
-- TOC entry 2350 (class 0 OID 0)
-- Dependencies: 215
-- Name: vivienda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vivienda_id_seq OWNED BY public.vivienda.id;


--
-- TOC entry 2103 (class 2604 OID 29775)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.animales ALTER COLUMN id SET DEFAULT nextval('public.animales_id_seq'::regclass);


--
-- TOC entry 2104 (class 2604 OID 29776)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carga_familiar ALTER COLUMN id SET DEFAULT nextval('public.carga_familiar_id_seq'::regclass);


--
-- TOC entry 2105 (class 2604 OID 29777)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.censo ALTER COLUMN id SET DEFAULT nextval('public.censo_id_seq'::regclass);


--
-- TOC entry 2106 (class 2604 OID 29778)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.discapacidad ALTER COLUMN id SET DEFAULT nextval('public.discapacidad_id_seq'::regclass);


--
-- TOC entry 2107 (class 2604 OID 29779)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.electrodomesticos ALTER COLUMN id SET DEFAULT nextval('public.electrodomesticos_id_seq'::regclass);


--
-- TOC entry 2108 (class 2604 OID 29780)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.enfermedad ALTER COLUMN id SET DEFAULT nextval('public.enfemedad_id_seq'::regclass);


--
-- TOC entry 2109 (class 2604 OID 29781)
-- Name: id_esp_vivienda; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.espacios_vivienda ALTER COLUMN id_esp_vivienda SET DEFAULT nextval('public.espacios_vivienda_id_esp_vivienda_seq'::regclass);


--
-- TOC entry 2121 (class 2604 OID 29893)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jornadas ALTER COLUMN id SET DEFAULT nextval('public.jornadas_id_seq'::regclass);


--
-- TOC entry 2110 (class 2604 OID 29782)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 2111 (class 2604 OID 29783)
-- Name: id_paredes; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paredes ALTER COLUMN id_paredes SET DEFAULT nextval('public.paredes_id_seq'::regclass);


--
-- TOC entry 2112 (class 2604 OID 29784)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personas ALTER COLUMN id SET DEFAULT nextval('public.personas_id_seq'::regclass);


--
-- TOC entry 2113 (class 2604 OID 29785)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personas_dis ALTER COLUMN id SET DEFAULT nextval('public.personas_dis_id_seq'::regclass);


--
-- TOC entry 2114 (class 2604 OID 29786)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personas_enfer ALTER COLUMN id SET DEFAULT nextval('public.personas_enfer_id_seq'::regclass);


--
-- TOC entry 2115 (class 2604 OID 29787)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plagas ALTER COLUMN id SET DEFAULT nextval('public.plagas_id_seq'::regclass);


--
-- TOC entry 2120 (class 2604 OID 29873)
-- Name: id_sector; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sectores ALTER COLUMN id_sector SET DEFAULT nextval('public.sectores_id_sector_seq'::regclass);


--
-- TOC entry 2116 (class 2604 OID 29788)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.servicios_comunales ALTER COLUMN id SET DEFAULT nextval('public.servicios_comunales_id_seq'::regclass);


--
-- TOC entry 2117 (class 2604 OID 29789)
-- Name: id_techo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.techo ALTER COLUMN id_techo SET DEFAULT nextval('public.techo_id_techo_seq'::regclass);


--
-- TOC entry 2118 (class 2604 OID 29790)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 2119 (class 2604 OID 29791)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vivienda ALTER COLUMN id SET DEFAULT nextval('public.vivienda_id_seq'::regclass);


--
-- TOC entry 2284 (class 0 OID 29585)
-- Dependencies: 181
-- Data for Name: animales; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.animales (id, cantidad, id_censo, tipo) VALUES (2, 2, 2, 1);
INSERT INTO public.animales (id, cantidad, id_censo, tipo) VALUES (3, 1, 2, 2);
INSERT INTO public.animales (id, cantidad, id_censo, tipo) VALUES (4, 2, 10, 2);


--
-- TOC entry 2351 (class 0 OID 0)
-- Dependencies: 182
-- Name: animales_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.animales_id_seq', 3, true);


--
-- TOC entry 2286 (class 0 OID 29590)
-- Dependencies: 183
-- Data for Name: carga_familiar; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (1, 2, 5);
INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (2, 2, 6);
INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (3, 3, 8);
INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (4, 3, 9);
INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (5, 3, 10);
INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (6, 5, 8);
INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (7, 6, 13);
INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (8, 7, 16);
INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (9, 8, 20);
INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (10, 10, 24);
INSERT INTO public.carga_familiar (id, id_censo, id_persona) VALUES (11, 11, 26);


--
-- TOC entry 2352 (class 0 OID 0)
-- Dependencies: 184
-- Name: carga_familiar_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.carga_familiar_id_seq', 2, true);


--
-- TOC entry 2288 (class 0 OID 29595)
-- Dependencies: 185
-- Data for Name: censo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.censo (id, fecha_creacion, id_jefe_familia, nivel_instruccion, tipo_institucion, profesion, nom_inst_laboral, ingreso_mensual, id_vivienda, aguas_blancas, tanques_agua, aguas_servidas, gas, cantidad_bombonas, sistema_electrico, planta_electrica, bombillos_ahorradores, transporte, ayuda_familiar, eliminado, nom_inst_educativa, recoleccion_basura, id_sector) VALUES (4, '2020-04-05', 21, 1, 1, '1', 'cecilio acosa', 2000, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'OMA', false, 'ninguna', 1, NULL);


--
-- TOC entry 2353 (class 0 OID 0)
-- Dependencies: 186
-- Name: censo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.censo_id_seq', 4, true);


--
-- TOC entry 2290 (class 0 OID 29603)
-- Dependencies: 187
-- Data for Name: discapacidad; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.discapacidad (id, descripcion) VALUES (1, 'fisica');
INSERT INTO public.discapacidad (id, descripcion) VALUES (2, 'motora');
INSERT INTO public.discapacidad (id, descripcion) VALUES (3, 'psicomotora');
INSERT INTO public.discapacidad (id, descripcion) VALUES (4, 'fisicomotora');
INSERT INTO public.discapacidad (id, descripcion) VALUES (5, 'NINGUNA');


--
-- TOC entry 2354 (class 0 OID 0)
-- Dependencies: 188
-- Name: discapacidad_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.discapacidad_id_seq', 5, true);


--
-- TOC entry 2292 (class 0 OID 29611)
-- Dependencies: 189
-- Data for Name: electrodomesticos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.electrodomesticos (id, nevera, cocina, microondas, lavadora, televisor, ventilador_aire, id_censo) VALUES (2, 1, 1, 1, 1, 3, 1, 2);
INSERT INTO public.electrodomesticos (id, nevera, cocina, microondas, lavadora, televisor, ventilador_aire, id_censo) VALUES (3, 1, 1, 0, 1, 2, 0, 3);
INSERT INTO public.electrodomesticos (id, nevera, cocina, microondas, lavadora, televisor, ventilador_aire, id_censo) VALUES (4, 1, 1, 0, 1, 2, 0, 5);
INSERT INTO public.electrodomesticos (id, nevera, cocina, microondas, lavadora, televisor, ventilador_aire, id_censo) VALUES (5, 1, 1, 0, 1, 2, 0, 6);
INSERT INTO public.electrodomesticos (id, nevera, cocina, microondas, lavadora, televisor, ventilador_aire, id_censo) VALUES (6, 1, 1, 0, 1, 2, 0, 7);
INSERT INTO public.electrodomesticos (id, nevera, cocina, microondas, lavadora, televisor, ventilador_aire, id_censo) VALUES (7, 1, 1, 0, 1, 1, 0, 8);
INSERT INTO public.electrodomesticos (id, nevera, cocina, microondas, lavadora, televisor, ventilador_aire, id_censo) VALUES (8, 1, 1, 0, 1, 2, 0, 9);
INSERT INTO public.electrodomesticos (id, nevera, cocina, microondas, lavadora, televisor, ventilador_aire, id_censo) VALUES (9, 0, 0, 0, 0, 0, 0, 10);
INSERT INTO public.electrodomesticos (id, nevera, cocina, microondas, lavadora, televisor, ventilador_aire, id_censo) VALUES (10, 0, 0, 0, 0, 0, 0, 11);


--
-- TOC entry 2355 (class 0 OID 0)
-- Dependencies: 190
-- Name: electrodomesticos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.electrodomesticos_id_seq', 2, true);


--
-- TOC entry 2356 (class 0 OID 0)
-- Dependencies: 192
-- Name: enfemedad_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.enfemedad_id_seq', 8, true);


--
-- TOC entry 2294 (class 0 OID 29616)
-- Dependencies: 191
-- Data for Name: enfermedad; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.enfermedad (id, descripcion) VALUES (1, 'diabetes');
INSERT INTO public.enfermedad (id, descripcion) VALUES (2, 'osteoporosis');
INSERT INTO public.enfermedad (id, descripcion) VALUES (3, 'ulcera');
INSERT INTO public.enfermedad (id, descripcion) VALUES (4, 'gastritis');
INSERT INTO public.enfermedad (id, descripcion) VALUES (5, 'glicemia');
INSERT INTO public.enfermedad (id, descripcion) VALUES (6, 'anemia');
INSERT INTO public.enfermedad (id, descripcion) VALUES (7, 'hepatitis');
INSERT INTO public.enfermedad (id, descripcion) VALUES (8, 'NINGUNA');


--
-- TOC entry 2296 (class 0 OID 29624)
-- Dependencies: 193
-- Data for Name: espacios_vivienda; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.espacios_vivienda (id_esp_vivienda, cocina, bano, sala, habitaciones, id_censo) VALUES (2, 1, 1, 1, 3, 2);
INSERT INTO public.espacios_vivienda (id_esp_vivienda, cocina, bano, sala, habitaciones, id_censo) VALUES (3, 1, 2, 1, 6, 3);
INSERT INTO public.espacios_vivienda (id_esp_vivienda, cocina, bano, sala, habitaciones, id_censo) VALUES (4, 1, 1, 1, 6, 5);
INSERT INTO public.espacios_vivienda (id_esp_vivienda, cocina, bano, sala, habitaciones, id_censo) VALUES (5, 1, 1, 1, 3, 6);
INSERT INTO public.espacios_vivienda (id_esp_vivienda, cocina, bano, sala, habitaciones, id_censo) VALUES (6, 1, 1, 1, 2, 7);
INSERT INTO public.espacios_vivienda (id_esp_vivienda, cocina, bano, sala, habitaciones, id_censo) VALUES (7, 1, 1, 1, 0, 8);
INSERT INTO public.espacios_vivienda (id_esp_vivienda, cocina, bano, sala, habitaciones, id_censo) VALUES (8, 1, 1, 1, 0, 9);
INSERT INTO public.espacios_vivienda (id_esp_vivienda, cocina, bano, sala, habitaciones, id_censo) VALUES (9, 0, 0, 0, 0, 10);
INSERT INTO public.espacios_vivienda (id_esp_vivienda, cocina, bano, sala, habitaciones, id_censo) VALUES (10, 0, 0, 0, 0, 11);


--
-- TOC entry 2357 (class 0 OID 0)
-- Dependencies: 194
-- Name: espacios_vivienda_id_esp_vivienda_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.espacios_vivienda_id_esp_vivienda_seq', 2, true);


--
-- TOC entry 2322 (class 0 OID 29890)
-- Dependencies: 219
-- Data for Name: jornadas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.jornadas (id, id_user, fecha_inicio, fecha_fin, tipo, asunto, estado, dirigido, observaciones) VALUES (1, 12, '2020-02-19', '2020-02-19', 'silla de  ruedas', 'incapacitado de la columna', 'en proceso', 'invalido', 'mas de un año incapacitado sin poder caminar');


--
-- TOC entry 2358 (class 0 OID 0)
-- Dependencies: 218
-- Name: jornadas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jornadas_id_seq', 1, false);


--
-- TOC entry 2298 (class 0 OID 29629)
-- Dependencies: 195
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.migrations (id, migration, batch) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (3, '2019_12_19_223004_campos_adicionales_tabla_users', 2);


--
-- TOC entry 2359 (class 0 OID 0)
-- Dependencies: 196
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 3, true);


--
-- TOC entry 2300 (class 0 OID 29634)
-- Dependencies: 197
-- Data for Name: paredes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.paredes (id_paredes, id_censo, tipo) VALUES (1, 2, 2);
INSERT INTO public.paredes (id_paredes, id_censo, tipo) VALUES (2, 3, 2);
INSERT INTO public.paredes (id_paredes, id_censo, tipo) VALUES (3, 6, 2);
INSERT INTO public.paredes (id_paredes, id_censo, tipo) VALUES (4, 7, 2);
INSERT INTO public.paredes (id_paredes, id_censo, tipo) VALUES (5, 8, 2);
INSERT INTO public.paredes (id_paredes, id_censo, tipo) VALUES (6, 9, 2);
INSERT INTO public.paredes (id_paredes, id_censo, tipo) VALUES (7, 10, 2);
INSERT INTO public.paredes (id_paredes, id_censo, tipo) VALUES (8, 11, 2);


--
-- TOC entry 2360 (class 0 OID 0)
-- Dependencies: 198
-- Name: paredes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.paredes_id_seq', 1, true);


--
-- TOC entry 2302 (class 0 OID 29639)
-- Dependencies: 199
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2303 (class 0 OID 29645)
-- Dependencies: 200
-- Data for Name: personas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.personas (id, nombre, apellido, cedula, fecha_nac, estado_civil, parentesco, nacionalidad, sexo) VALUES (11, NULL, NULL, 5894093, NULL, 0, 0, 0, 0);
INSERT INTO public.personas (id, nombre, apellido, cedula, fecha_nac, estado_civil, parentesco, nacionalidad, sexo) VALUES (21, 'david', 'calzadilla', 26915519, '1998-12-25', 0, 0, 0, 0);


--
-- TOC entry 2304 (class 0 OID 29651)
-- Dependencies: 201
-- Data for Name: personas_dis; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.personas_dis (id, id_discapacidad, id_persona) VALUES (1, 1, 5);
INSERT INTO public.personas_dis (id, id_discapacidad, id_persona) VALUES (2, 3, 6);
INSERT INTO public.personas_dis (id, id_discapacidad, id_persona) VALUES (3, 3, 8);
INSERT INTO public.personas_dis (id, id_discapacidad, id_persona) VALUES (4, 1, 24);


--
-- TOC entry 2361 (class 0 OID 0)
-- Dependencies: 202
-- Name: personas_dis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personas_dis_id_seq', 2, true);


--
-- TOC entry 2306 (class 0 OID 29656)
-- Dependencies: 203
-- Data for Name: personas_enfer; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (1, 1, 4);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (2, 2, 4);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (3, 1, 5);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (4, 2, 5);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (5, 3, 6);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (6, 7, 6);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (7, 4, 7);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (8, 1, 10);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (9, 1, 7);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (10, 8, 8);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (11, 2, 15);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (12, 7, 19);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (13, 8, 21);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (14, 7, 23);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (15, 1, 24);
INSERT INTO public.personas_enfer (id, id_enfer, id_persona) VALUES (16, 8, 25);


--
-- TOC entry 2362 (class 0 OID 0)
-- Dependencies: 204
-- Name: personas_enfer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personas_enfer_id_seq', 6, true);


--
-- TOC entry 2363 (class 0 OID 0)
-- Dependencies: 205
-- Name: personas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personas_id_seq', 24, true);


--
-- TOC entry 2309 (class 0 OID 29663)
-- Dependencies: 206
-- Data for Name: plagas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.plagas (id, ratones, hormigas, cucarachas, moscas, otros, id_censo) VALUES (4, 0, 0, 1, 0, '', 2);
INSERT INTO public.plagas (id, ratones, hormigas, cucarachas, moscas, otros, id_censo) VALUES (5, 0, 0, 1, 1, '', 2);
INSERT INTO public.plagas (id, ratones, hormigas, cucarachas, moscas, otros, id_censo) VALUES (6, 0, 0, 1, 1, 'Otras plagas', 2);
INSERT INTO public.plagas (id, ratones, hormigas, cucarachas, moscas, otros, id_censo) VALUES (7, 0, 0, 0, 0, NULL, 6);
INSERT INTO public.plagas (id, ratones, hormigas, cucarachas, moscas, otros, id_censo) VALUES (8, 0, 0, 0, 0, NULL, 7);
INSERT INTO public.plagas (id, ratones, hormigas, cucarachas, moscas, otros, id_censo) VALUES (9, 0, 0, 0, 0, NULL, 8);
INSERT INTO public.plagas (id, ratones, hormigas, cucarachas, moscas, otros, id_censo) VALUES (10, 0, 0, 0, 0, NULL, 9);
INSERT INTO public.plagas (id, ratones, hormigas, cucarachas, moscas, otros, id_censo) VALUES (11, 0, 0, 0, 0, NULL, 10);
INSERT INTO public.plagas (id, ratones, hormigas, cucarachas, moscas, otros, id_censo) VALUES (12, 0, 0, 0, 0, NULL, 11);


--
-- TOC entry 2364 (class 0 OID 0)
-- Dependencies: 207
-- Name: plagas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.plagas_id_seq', 6, true);


--
-- TOC entry 2320 (class 0 OID 29870)
-- Dependencies: 217
-- Data for Name: sectores; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.sectores (id_sector, sector, activo) VALUES (3, 'ALCAPAL', true);
INSERT INTO public.sectores (id_sector, sector, activo) VALUES (4, 'BUCARE ALTO', true);
INSERT INTO public.sectores (id_sector, sector, activo) VALUES (1, 'CASAMAR', true);
INSERT INTO public.sectores (id_sector, sector, activo) VALUES (6, 'EL MARTILLO', true);


--
-- TOC entry 2365 (class 0 OID 0)
-- Dependencies: 216
-- Name: sectores_id_sector_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sectores_id_sector_seq', 6, true);


--
-- TOC entry 2311 (class 0 OID 29671)
-- Dependencies: 208
-- Data for Name: servicios_comunales; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (1, '', 2, 0, 1, 0, 0);
INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (2, '', 2, 0, 1, 1, 0);
INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (3, '', 2, 0, 1, 1, 1);
INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (4, 'otra cosa', 2, 0, 1, 1, 1);
INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (5, 'ninguno', 5, 0, 0, 0, 0);
INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (6, 'todos los anteriores', 6, 0, 0, 0, 0);
INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (7, NULL, 7, 0, 0, 0, 0);
INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (8, NULL, 8, 0, 0, 0, 0);
INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (9, NULL, 9, 0, 0, 0, 0);
INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (10, NULL, 10, 0, 0, 0, 0);
INSERT INTO public.servicios_comunales (id, otros, id_censo, mercado, bodega, farmacia, plaza_parque) VALUES (11, NULL, 11, 0, 0, 0, 0);


--
-- TOC entry 2366 (class 0 OID 0)
-- Dependencies: 209
-- Name: servicios_comunales_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.servicios_comunales_id_seq', 4, true);


--
-- TOC entry 2313 (class 0 OID 29679)
-- Dependencies: 210
-- Data for Name: techo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.techo (id_techo, id_censo, tipo) VALUES (1, 2, 2);
INSERT INTO public.techo (id_techo, id_censo, tipo) VALUES (2, 3, 1);
INSERT INTO public.techo (id_techo, id_censo, tipo) VALUES (3, 6, 1);
INSERT INTO public.techo (id_techo, id_censo, tipo) VALUES (4, 7, 2);
INSERT INTO public.techo (id_techo, id_censo, tipo) VALUES (5, 8, 2);
INSERT INTO public.techo (id_techo, id_censo, tipo) VALUES (6, 9, 1);
INSERT INTO public.techo (id_techo, id_censo, tipo) VALUES (7, 10, 2);
INSERT INTO public.techo (id_techo, id_censo, tipo) VALUES (8, 11, 2);


--
-- TOC entry 2367 (class 0 OID 0)
-- Dependencies: 211
-- Name: techo_id_techo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.techo_id_techo_seq', 1, true);


--
-- TOC entry 2315 (class 0 OID 29684)
-- Dependencies: 212
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users (id, name, email, password, remember_token, created_at, updated_at, lastname, vat, type, id_sector) VALUES (9, 'Omalis', 'omalisdiaz@gmail.com', '$2y$10$Y9bk4CRbkVP2DZB5CJgLSetWs2VrPDggMhebk94CKpjLbTMvkrfPu', 'smHTaggtcF8Ac6g4mS6otw4R61g9TRtma27pJ5rXWydBXQSkeWSzw3lBavja', '2019-12-19 22:54:54', '2019-12-19 22:54:54', 'Diaz', '24773685', 1, 3);
INSERT INTO public.users (id, name, email, password, remember_token, created_at, updated_at, lastname, vat, type, id_sector) VALUES (3, 'Vocero', 'vocero@gmail.com', '$2y$10$Y9bk4CRbkVP2DZB5CJgLSetWs2VrPDggMhebk94CKpjLbTMvkrfPu', 'qVsmnWSff2Kr2hhGsad8oXisG4vO70uxUOApQLuDXSncbZ5b5W8BJeNnapSJ', '2019-12-19 22:54:54', '2019-12-19 22:54:54', 'Comunal', '24773683', 2, 3);
INSERT INTO public.users (id, name, email, password, remember_token, created_at, updated_at, lastname, vat, type, id_sector) VALUES (11, 'Admin', 'admin@gmail.com', '$2y$10$Y9bk4CRbkVP2DZB5CJgLSetWs2VrPDggMhebk94CKpjLbTMvkrfPu', 'c3d1NjPh85DRjleCjNpHcA9oHXjrzSrunR1AtYB0t7GLlVD2Y0sgharSnkGB', '2019-12-19 22:54:54', '2019-12-19 22:54:54', 'Comunal', '24773688', 1, 3);
INSERT INTO public.users (id, name, email, password, remember_token, created_at, updated_at, lastname, vat, type, id_sector) VALUES (12, 'isabel', 'isa@gmail.com', '$2y$10$O6NjuyW3fwz5GMqU86tgl.OKNuM3R6ILxFOwh41UUDRDPyWvoluw6', 'Jxf2xDgYe0XFIC2PqHzFSW7WnPrRrzBzfEYpVWybzGyRD9wNJ9Lpzc1UL8fT', '2020-02-09 07:17:09', '2020-02-09 07:17:09', 'ortiz', '10329338', 2, NULL);


--
-- TOC entry 2368 (class 0 OID 0)
-- Dependencies: 213
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 12, true);


--
-- TOC entry 2317 (class 0 OID 29692)
-- Dependencies: 214
-- Data for Name: vivienda; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.vivienda (id, nro_casa, tipo, estado, tenencia) VALUES (3, 901, '2', '4', '1');
INSERT INTO public.vivienda (id, nro_casa, tipo, estado, tenencia) VALUES (4, 2, '1', '4', '1');
INSERT INTO public.vivienda (id, nro_casa, tipo, estado, tenencia) VALUES (5, 3, '1', '4', '1');
INSERT INTO public.vivienda (id, nro_casa, tipo, estado, tenencia) VALUES (6, 2, '1', '4', '1');
INSERT INTO public.vivienda (id, nro_casa, tipo, estado, tenencia) VALUES (7, 2, '1', '4', '1');
INSERT INTO public.vivienda (id, nro_casa, tipo, estado, tenencia) VALUES (9, 2, '2', '4', '2');
INSERT INTO public.vivienda (id, nro_casa, tipo, estado, tenencia) VALUES (13, 2, '1', '4', '1');
INSERT INTO public.vivienda (id, nro_casa, tipo, estado, tenencia) VALUES (14, 3, '2', '3', '3');
INSERT INTO public.vivienda (id, nro_casa, tipo, estado, tenencia) VALUES (16, 2, '2', '4', '3');
INSERT INTO public.vivienda (id, nro_casa, tipo, estado, tenencia) VALUES (19, 3, '2', '4', '3');


--
-- TOC entry 2369 (class 0 OID 0)
-- Dependencies: 215
-- Name: vivienda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vivienda_id_seq', 7, true);


--
-- TOC entry 2123 (class 2606 OID 29718)
-- Name: animales_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.animales
    ADD CONSTRAINT animales_pkey PRIMARY KEY (id);


--
-- TOC entry 2125 (class 2606 OID 29720)
-- Name: carga_familiar_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carga_familiar
    ADD CONSTRAINT carga_familiar_pkey PRIMARY KEY (id);


--
-- TOC entry 2127 (class 2606 OID 29722)
-- Name: censo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.censo
    ADD CONSTRAINT censo_pkey PRIMARY KEY (id);


--
-- TOC entry 2129 (class 2606 OID 29724)
-- Name: discapacidad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.discapacidad
    ADD CONSTRAINT discapacidad_pkey PRIMARY KEY (id);


--
-- TOC entry 2131 (class 2606 OID 29726)
-- Name: electrodomesticos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.electrodomesticos
    ADD CONSTRAINT electrodomesticos_pkey PRIMARY KEY (id);


--
-- TOC entry 2133 (class 2606 OID 29728)
-- Name: enfemedad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.enfermedad
    ADD CONSTRAINT enfemedad_pkey PRIMARY KEY (id);


--
-- TOC entry 2135 (class 2606 OID 29730)
-- Name: espacios_vivienda_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.espacios_vivienda
    ADD CONSTRAINT espacios_vivienda_pkey PRIMARY KEY (id_esp_vivienda);


--
-- TOC entry 2166 (class 2606 OID 29898)
-- Name: jornadas_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jornadas
    ADD CONSTRAINT jornadas_pk PRIMARY KEY (id);


--
-- TOC entry 2137 (class 2606 OID 29732)
-- Name: migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2139 (class 2606 OID 29734)
-- Name: paredes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paredes
    ADD CONSTRAINT paredes_pkey PRIMARY KEY (id_paredes);


--
-- TOC entry 2144 (class 2606 OID 29736)
-- Name: personas_dis_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personas_dis
    ADD CONSTRAINT personas_dis_pkey PRIMARY KEY (id);


--
-- TOC entry 2146 (class 2606 OID 29738)
-- Name: personas_enfer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personas_enfer
    ADD CONSTRAINT personas_enfer_pkey PRIMARY KEY (id);


--
-- TOC entry 2142 (class 2606 OID 29740)
-- Name: personas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personas
    ADD CONSTRAINT personas_pkey PRIMARY KEY (id);


--
-- TOC entry 2148 (class 2606 OID 29742)
-- Name: plagas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plagas
    ADD CONSTRAINT plagas_pkey PRIMARY KEY (id);


--
-- TOC entry 2162 (class 2606 OID 29875)
-- Name: sectores_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sectores
    ADD CONSTRAINT sectores_pk PRIMARY KEY (id_sector);


--
-- TOC entry 2164 (class 2606 OID 29877)
-- Name: sectores_secto_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sectores
    ADD CONSTRAINT sectores_secto_unique UNIQUE (sector);


--
-- TOC entry 2150 (class 2606 OID 29744)
-- Name: servicios_comunales_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.servicios_comunales
    ADD CONSTRAINT servicios_comunales_pkey PRIMARY KEY (id);


--
-- TOC entry 2152 (class 2606 OID 29746)
-- Name: techo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.techo
    ADD CONSTRAINT techo_pkey PRIMARY KEY (id_techo);


--
-- TOC entry 2154 (class 2606 OID 29748)
-- Name: users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2156 (class 2606 OID 29750)
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2158 (class 2606 OID 29752)
-- Name: users_vat_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_vat_unique UNIQUE (vat);


--
-- TOC entry 2160 (class 2606 OID 29754)
-- Name: vivienda_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vivienda
    ADD CONSTRAINT vivienda_pkey PRIMARY KEY (id);


--
-- TOC entry 2140 (class 1259 OID 29755)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- TOC entry 2167 (class 2606 OID 29878)
-- Name: censo_sectores_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.censo
    ADD CONSTRAINT censo_sectores_fk FOREIGN KEY (id_sector) REFERENCES public.sectores(id_sector);


--
-- TOC entry 2169 (class 2606 OID 29899)
-- Name: jornadas_users_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jornadas
    ADD CONSTRAINT jornadas_users_fk FOREIGN KEY (id_user) REFERENCES public.users(id);


--
-- TOC entry 2168 (class 2606 OID 29883)
-- Name: users_sectores_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_sectores_fk FOREIGN KEY (id_sector) REFERENCES public.sectores(id_sector);


--
-- TOC entry 2330 (class 0 OID 0)
-- Dependencies: 7
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2020-04-06 13:19:34

--
-- PostgreSQL database dump complete
--

