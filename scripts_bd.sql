/*Je n'ai pas réussi à sauvegarder ma base de données à cause de problème de version. J'ai donc regroupé ici les scripts que je possède pour celle ci.
*/


-- Table: public.villes

-- DROP TABLE public.villes;

CREATE TABLE public.villes
(
  idville integer NOT NULL DEFAULT nextval('villes_idville_seq'::regclass),
  nomvile character varying(50),
  CONSTRAINT ville_pk PRIMARY KEY (idville)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.villes
  OWNER TO gmkbeacvfgfkxy;

-- Table: public.types

-- DROP TABLE public.types;

CREATE TABLE public.types
(
  idtype integer NOT NULL DEFAULT nextval('types_idtype_seq'::regclass),
  nomtype character varying(50),
  CONSTRAINT type_pk PRIMARY KEY (idtype)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.types
  OWNER TO gmkbeacvfgfkxy;

-- Table: public.services

-- DROP TABLE public.services;

CREATE TABLE public.services
(
  idservice integer NOT NULL DEFAULT nextval('services_idservice_seq'::regclass),
  appellationservice character varying(50),
  CONSTRAINT service_pk PRIMARY KEY (idservice)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.services
  OWNER TO gmkbeacvfgfkxy;

-- Trigger: trigger_serv on public.services

-- DROP TRIGGER trigger_serv ON public.services;

CREATE TRIGGER trigger_serv
  BEFORE DELETE
  ON public.services
  FOR EACH ROW
  EXECUTE PROCEDURE public.verif_delete_serv();

-- Table: public.objets

-- DROP TABLE public.objets;

CREATE TABLE public.objets
(
  idobjet integer NOT NULL DEFAULT nextval('objets_idobjet_seq'::regclass),
  appellationobjet character varying(50),
  idtype integer,
  CONSTRAINT objet_pk PRIMARY KEY (idobjet)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.objets
  OWNER TO gmkbeacvfgfkxy;

-- Trigger: trigger_obj on public.objets

-- DROP TRIGGER trigger_obj ON public.objets;

CREATE TRIGGER trigger_obj
  BEFORE DELETE
  ON public.objets
  FOR EACH ROW
  EXECUTE PROCEDURE public.verif_delete_obj();



-- Table: public.interventions

-- DROP TABLE public.interventions;

CREATE TABLE public.interventions
(
  idintervention integer NOT NULL DEFAULT nextval('interventions_idintervention_seq'::regclass),
  idobjet integer,
  idservice integer,
  dureeintervention numeric,
  descriptionintervention character varying(200),
  CONSTRAINT intervention_pk PRIMARY KEY (idintervention),
  CONSTRAINT service_of_intervention_fk FOREIGN KEY (idservice)
      REFERENCES public.services (idservice) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.interventions
  OWNER TO gmkbeacvfgfkxy;

-- Trigger: trigger_interv on public.interventions

-- DROP TRIGGER trigger_interv ON public.interventions;

CREATE TRIGGER trigger_interv
  BEFORE DELETE
  ON public.interventions
  FOR EACH ROW
  EXECUTE PROCEDURE public.verif_delete_interv();


-- Table: public.clients

-- DROP TABLE public.clients;

CREATE TABLE public.clients
(
  idclient integer NOT NULL DEFAULT nextval('clients_idclient_seq'::regclass),
  nomclient character varying(50),
  prenomclient character varying(50),
  telephoneclient integer,
  email character varying(50),
  mdp character varying(300),
  idtype integer,
  numeroadresse character varying(50),
  rueadresse character varying(50),
  idville integer,
  isadmin integer,
  CONSTRAINT client_pk PRIMARY KEY (idclient),
  CONSTRAINT ville_of_client_fk FOREIGN KEY (idville)
      REFERENCES public.villes (idville) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.clients
  OWNER TO gmkbeacvfgfkxy;


-- Table: public.rdv

-- DROP TABLE public.rdv;

CREATE TABLE public.rdv
(
  idrdv integer NOT NULL DEFAULT nextval('rdv_idrdv_seq'::regclass),
  idintervention integer NOT NULL,
  idclient integer NOT NULL,
  datedemande date NOT NULL,
  datedispo1 date,
  datedispo2 date,
  daterdv date,
  commentairerdv character varying(200),
  valide boolean,
  CONSTRAINT rdv_pk PRIMARY KEY (idintervention, idclient, datedemande),
  CONSTRAINT intervention_of_rdv_fk FOREIGN KEY (idintervention)
      REFERENCES public.interventions (idintervention) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.rdv
  OWNER TO gmkbeacvfgfkxy;

-- Trigger: trigger_rdv on public.rdv

-- DROP TRIGGER trigger_rdv ON public.rdv;

CREATE TRIGGER trigger_rdv
  BEFORE INSERT
  ON public.rdv
  FOR EACH ROW
  EXECUTE PROCEDURE public.verif_rdv();


CREATE FUNCTION verif_delete_interv() RETURNS TRIGGER AS $trigger_interv$
DECLARE 
ddate date;
nbrdv integer;
BEGIN
select CURRENT_DATE into ddate;
select count(*) into nbrdv from rdv where rdv.idintervention=old.idintervention and rdv.daterdv >= ddate;
IF nbrdv >0 THEN
RAISE EXCEPTION 'L intervention fait partie de rdv a venir';
END IF;
RETURN NEW;
END; 
$trigger_interv$

CREATE FUNCTION verif_delete_obj() RETURNS TRIGGER AS $trigger_obj$
DECLARE 
nbinterv integer;
BEGIN
select count(*) into nbinterv from interventions where interventions.idobjet=new.idobjet;
IF nbinterv >0 THEN
RAISE EXCEPTION 'L objet fait partie d interventions';
END IF;
RETURN NEW;
END; 
$trigger_obj$

CREATE FUNCTION verif_delete_serv() RETURNS TRIGGER AS $trigger_serv$
DECLARE 
nbinterv integer;
BEGIN
select count(*) into nbinterv from interventions where interventions.idservice=new.idservice;
IF nbinterv >0 THEN
RAISE EXCEPTION 'Le service fait partie d interventions';
END IF;
RETURN NEW;
END; 
$trigger_serv$

CREATE FUNCTION verif_rdv() RETURNS TRIGGER AS $trigger_rdv$
DECLARE
ddate date;
BEGIN
select CURRENT_DATE into ddate;
IF new.datedispo1 < ddate OR new.datedispo2 < ddate THEN
  RAISE EXCEPTION 'Vos dates sont deja passees';
END IF;
RETURN NEW;
END; 
$trigger_rdv$