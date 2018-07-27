/*
 Navicat Premium Data Transfer

 Source Server         : duc
 Source Server Type    : PostgreSQL
 Source Server Version : 100004
 Source Host           : 172.16.3.82:5432
 Source Catalog        : Training
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 100004
 File Encoding         : 65001

 Date: 27/07/2018 08:49:28
*/


-- ----------------------------
-- Table structure for M_OFFICE
-- ----------------------------
DROP TABLE IF EXISTS "public"."M_OFFICE";
CREATE TABLE "public"."M_OFFICE" (
  "OFFICE_CD" char(10) COLLATE "pg_catalog"."default" NOT NULL,
  "PERSON" char(100) COLLATE "pg_catalog"."default",
  "STATE" char(100) COLLATE "pg_catalog"."default",
  "OFFICE_NAME" char(100) COLLATE "pg_catalog"."default",
  "QUALIFICATION" char(100) COLLATE "pg_catalog"."default",
  "OFFICE_SNAME" char(100) COLLATE "pg_catalog"."default",
  "PHONE" char(10) COLLATE "pg_catalog"."default",
  "ADDRESS" char(100) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of M_OFFICE
-- ----------------------------
INSERT INTO "public"."M_OFFICE" VALUES ('e00001    ', 'duc                                                                                                 ', 'tphcm                                                                                               ', 'demo                                                                                                ', 'demo                                                                                                ', 'demo                                                                                                ', '0939100139', 'Tphcm                                                                                               ');
INSERT INTO "public"."M_OFFICE" VALUES ('e00002    ', 'duc2                                                                                                ', 'tphcm                                                                                               ', 'demo                                                                                                ', 'demo                                                                                                ', 'demo                                                                                                ', '0939100139', 'Tphcm                                                                                               ');
INSERT INTO "public"."M_OFFICE" VALUES ('e00003    ', 'abc                                                                                                 ', 'hcm                                                                                                 ', 'demo                                                                                                ', 'demo                                                                                                ', 'demo                                                                                                ', '123456789 ', 'hcm                                                                                                 ');
INSERT INTO "public"."M_OFFICE" VALUES ('e00004    ', 'abbb                                                                                                ', 'hcn                                                                                                 ', 'abc                                                                                                 ', 'xyz                                                                                                 ', 'aaaa                                                                                                ', '123456789 ', 'hcm                                                                                                 ');
INSERT INTO "public"."M_OFFICE" VALUES ('e00005    ', 'xxxx                                                                                                ', 'hc                                                                                                  ', 'xxxx                                                                                                ', 'asd                                                                                                 ', 'asdasd                                                                                              ', '123456789 ', 'asdasd                                                                                              ');

-- ----------------------------
-- Primary Key structure for table M_OFFICE
-- ----------------------------
ALTER TABLE "public"."M_OFFICE" ADD CONSTRAINT "M_OFFICE_pkey" PRIMARY KEY ("OFFICE_CD");
