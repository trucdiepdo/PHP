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

 Date: 27/07/2018 08:49:23
*/


-- ----------------------------
-- Table structure for M_GROUP_OFFICE
-- ----------------------------
DROP TABLE IF EXISTS "public"."M_GROUP_OFFICE";
CREATE TABLE "public"."M_GROUP_OFFICE" (
  "GROUP_ID" char(4) COLLATE "pg_catalog"."default" NOT NULL,
  "GROUP_FLG" char(2) COLLATE "pg_catalog"."default" NOT NULL,
  "OFFICE_CD" char(6) COLLATE "pg_catalog"."default" NOT NULL,
  "ADD_DATE" date,
  "ADD_EMP_ID" char(10) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of M_GROUP_OFFICE
-- ----------------------------
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('194 ', '1 ', 'e00001', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('194 ', '1 ', 'e00002', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('194 ', '1 ', 'e00003', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('465 ', '1 ', 'e00001', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('465 ', '1 ', 'e00002', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('5   ', '5 ', '5     ', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('3   ', '1 ', 'e00002', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('7   ', '5 ', 'e00006', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('143 ', '2 ', 'e00002', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('143 ', '2 ', 'e00003', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('143 ', '2 ', 'e00004', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('1   ', '1 ', '1     ', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('10  ', '1 ', 'e00001', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('10  ', '1 ', 'e00002', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('5   ', '2 ', 'e00003', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('619 ', '1 ', 'e00004', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('475 ', '1 ', 'e00001', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('475 ', '1 ', 'e00002', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('475 ', '1 ', 'e00003', NULL, NULL);
INSERT INTO "public"."M_GROUP_OFFICE" VALUES ('475 ', '1 ', 'e00004', NULL, NULL);

-- ----------------------------
-- Primary Key structure for table M_GROUP_OFFICE
-- ----------------------------
ALTER TABLE "public"."M_GROUP_OFFICE" ADD CONSTRAINT "M_GROUP_OFFICE_pkey" PRIMARY KEY ("GROUP_ID", "GROUP_FLG", "OFFICE_CD");
