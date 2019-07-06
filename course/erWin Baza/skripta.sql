
CREATE TABLE [Aktivnost]
( 
	[IdAktivnost]        integer  NOT NULL ,
	[Naziv]              char(32)  NULL ,
	[Tip]                char(32)  NULL ,
	[datumOd]            datetime  NULL ,
	[datumDo]            datetime  NULL ,
	[Mesto]              char(32)  NULL ,
	[Opis]               char(32)  NULL 
)
go

ALTER TABLE [Aktivnost]
	ADD CONSTRAINT [XPKAktivnost] PRIMARY KEY  CLUSTERED ([IdAktivnost] ASC)
go

CREATE TABLE [Obucenost]
( 
	[IdObucenost]        char(18)  NOT NULL ,
	[_default__5accae6e] char(18)  NOT NULL ,
	[Naziv]              char(18)  NULL 
)
go

ALTER TABLE [Obucenost]
	ADD CONSTRAINT [XPKObucenost] PRIMARY KEY  CLUSTERED ([IdObucenost] ASC,[_default__5accae6e] ASC)
go

CREATE TABLE [Obucenost]
( 
	[IdObucenost]        integer  NOT NULL ,
	[Naziv]              char(64)  NULL 
)
go

ALTER TABLE [Obucenost]
	ADD CONSTRAINT [XPKObucenost] PRIMARY KEY  CLUSTERED ([IdObucenost] ASC)
go

CREATE TABLE [Obuka]
( 
	[IdObucenost]        integer  NOT NULL ,
	[IdObuka]            integer  NOT NULL ,
	[Datum]              datetime  NULL ,
	[Mesto]              char(32)  NULL ,
	[BrojUcesnika]       integer  NULL ,
	[OpisObuke]          char(128)  NULL 
)
go

ALTER TABLE [Obuka]
	ADD CONSTRAINT [XPKObuka] PRIMARY KEY  CLUSTERED ([IdObuka] ASC)
go

CREATE TABLE [Seminar]
( 
	[IdSeminar]          integer  NOT NULL ,
	[Tema]               char(32)  NULL ,
	[Datum]              datetime  NULL ,
	[BrojUcesnika]       integer  NULL ,
	[Mesto]              char(32)  NULL ,
	[OpisSeminara]       char(128)  NULL 
)
go

ALTER TABLE [Seminar]
	ADD CONSTRAINT [XPKSeminar] PRIMARY KEY  CLUSTERED ([IdSeminar] ASC)
go

CREATE TABLE [Ucesce]
( 
	[IdUcesce]           integer  NOT NULL ,
	[IdVolonter]         integer  NOT NULL ,
	[IdAktivnost]        integer  NOT NULL ,
	[Status]             char(32)  NULL 
)
go

ALTER TABLE [Ucesce]
	ADD CONSTRAINT [XPKUcesce] PRIMARY KEY  CLUSTERED ([IdUcesce] ASC)
go

CREATE TABLE [VolObucenost]
( 
	[IdVolonter]         integer  NOT NULL ,
	[IdObucenost]        integer  NOT NULL ,
	[Godina]             integer  NULL ,
	[OpisObuke]          char(128)  NULL ,
	[Id]                 integer  NOT NULL 
)
go

ALTER TABLE [VolObucenost]
	ADD CONSTRAINT [XPKVolObucenost] PRIMARY KEY  CLUSTERED ([Id] ASC)
go

CREATE TABLE [Volonter]
( 
	[IdVolonter]         integer  NOT NULL ,
	[Ime]                char(16)  NULL ,
	[Prezime]            char(32)  NULL ,
	[DatumRodjenja]      datetime  NULL ,
	[DatumPristupa]      integer  NULL ,
	[Email]              char(64)  NULL ,
	[Password]           char(64)  NULL ,
	[Pol]                char(1)  NULL 
	CONSTRAINT [Pravilo]
		CHECK  ( [Pol]='M' OR [Pol]='Z' ),
	[Prebivaliste]       char(32)  NULL ,
	[Zanimanje]          char(32)  NULL ,
	[Slika]              image  NULL ,
	[PravaPristupa]      char(1)  NULL 
	CONSTRAINT [PraviloP]
		CHECK  ( [PravaPristupa]='V' OR [PravaPristupa]='M' OR [PravaPristupa]='A' OR [PravaPristupa]='G' )
)
go

ALTER TABLE [Volonter]
	ADD CONSTRAINT [XPKVolonter] PRIMARY KEY  CLUSTERED ([IdVolonter] ASC)
go

CREATE TABLE [VolSeminar]
( 
	[IdSeminar]          integer  NOT NULL ,
	[IdVolonter]         integer  NOT NULL ,
	[Id]                 char(18)  NOT NULL 
)
go

ALTER TABLE [VolSeminar]
	ADD CONSTRAINT [XPKVolSeminar] PRIMARY KEY  CLUSTERED ([Id] ASC)
go


ALTER TABLE [Obuka]
	ADD CONSTRAINT [R_3] FOREIGN KEY ([IdObucenost]) REFERENCES [Obucenost]([IdObucenost])
		ON UPDATE CASCADE
go


ALTER TABLE [Ucesce]
	ADD CONSTRAINT [R_6] FOREIGN KEY ([IdVolonter]) REFERENCES [Volonter]([IdVolonter])
		ON UPDATE CASCADE
go

ALTER TABLE [Ucesce]
	ADD CONSTRAINT [R_7] FOREIGN KEY ([IdAktivnost]) REFERENCES [Aktivnost]([IdAktivnost])
		ON UPDATE CASCADE
go


ALTER TABLE [VolObucenost]
	ADD CONSTRAINT [R_1] FOREIGN KEY ([IdVolonter]) REFERENCES [Volonter]([IdVolonter])
		ON DELETE CASCADE
		ON UPDATE CASCADE
go

ALTER TABLE [VolObucenost]
	ADD CONSTRAINT [R_2] FOREIGN KEY ([IdObucenost]) REFERENCES [Obucenost]([IdObucenost])
		ON DELETE CASCADE
		ON UPDATE CASCADE
go


ALTER TABLE [VolSeminar]
	ADD CONSTRAINT [R_4] FOREIGN KEY ([IdSeminar]) REFERENCES [Seminar]([IdSeminar])
		ON DELETE CASCADE
		ON UPDATE CASCADE
go

ALTER TABLE [VolSeminar]
	ADD CONSTRAINT [R_5] FOREIGN KEY ([IdVolonter]) REFERENCES [Volonter]([IdVolonter])
		ON UPDATE CASCADE
go
